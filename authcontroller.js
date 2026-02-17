const bcrypt = require("bcryptjs");              //Use bcrypt for password hashing


const db = require("../db");

/*
  Register User (Hash password, insert user into database)
*/
exports.register = (req, res) => {
  const { username, email, password } = req.body;

  const passwordHash = bcrypt.hashSync(password, 10);

  const sql = `
    INSERT INTO users (username, email, password_hash, role_id)
    VALUES (?, ?, ?, 1)
  `;

  // Execute query
  db.query(sql, [username, email, passwordHash], (err) => {
    if (err) {
      return res.status(400).json({ error: err });
    }
    res.json({ message: "User registered successfully" });
  });
};

/*
  Login User (Find user (email), compare password, store user in session)
*/
exports.login = (req, res) => {
  const { email, password } = req.body;

  // Find user in database
  db.query(
    "SELECT * FROM users WHERE email = ?",
    [email],
    (err, results) => {

      // If user not found
      if (results.length === 0) {
        return res.status(401).json({ message: "Invalid credentials" });
      }

      const user = results[0];

      // Compare entered password with stored hash
      const isValid = bcrypt.compareSync(password, user.password_hash);

      if (!isValid) {
        return res.status(401).json({ message: "Invalid credentials" });
      }

      // Save user info in session
      req.session.user = {
        id: user.user_id,
        role: user.role_id
      };

      res.json({ message: "Login successful" });
    }
  );
};

/*
  Destroy Session to Logout
*/
exports.logout = (req, res) => {
  req.session.destroy(() => {
    res.json({ message: "Logged out successfully" });
  });
};
