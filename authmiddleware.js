//Middleware checks if user is logged in
exports.isAuthenticated = (req, res, next) => {
  if (!req.session.user) {
    return res.status(403).json({ message: "Access denied" });
  }
  next();
};

//Middleware checks if admin is logged in
exports.isAdmin = (req, res, next) => {
  if (req.session.user.role !== 2) {
    return res.status(403).json({ message: "Admin access required" });
  }
  next();
};
