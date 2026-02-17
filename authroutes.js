// Import Express router
const express = require("express");
const router = express.Router();

// Import authentication controller
const authController = require("../controllers/authController");

// Route for user registration
router.post("/register", authController.register);

// Route for user login
router.post("/login", authController.login);

// Route for user logout
router.post("/logout", authController.logout);

// Export routes so app.js can use them
module.exports = router;
