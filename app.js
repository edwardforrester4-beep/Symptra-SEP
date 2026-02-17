const express = require("express");
const session = require("express-session");
const authRoutes = require("./routes/authRoutes");

const app = express();

// Middleware to parse JSON from requests
app.use(express.json());

// Session middleware (handles login state)
app.use(session({
  secret: "key-secret",  
  resave: false,              
  saveUninitialized: false
}));


app.use("/api/auth", authRoutes);


app.listen(3000, () => {
  console.log("Server running on port 3000");
});
