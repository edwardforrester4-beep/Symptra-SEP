DROP TABLE IF EXISTS referrals;
DROP TABLE IF EXISTS billing;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS records;
DROP TABLE IF EXISTS appointments;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE,
  password VARCHAR(255),
  role VARCHAR(10)
);

CREATE TABLE appointments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  doctor VARCHAR(100),
  date VARCHAR(50),
  time VARCHAR(50)
);

CREATE TABLE records (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  diagnosis VARCHAR(255),
  doctor VARCHAR(100),
  date VARCHAR(50)
);

CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sender_id INT,
  receiver_id INT,
  message TEXT,
  date VARCHAR(50)
);

CREATE TABLE billing (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  amount VARCHAR(50),
  status VARCHAR(50),
  date VARCHAR(50)
);

CREATE TABLE referrals (
  id INT AUTO_INCREMENT PRIMARY KEY,
  patient_id INT,
  referred_to VARCHAR(100),
  reason VARCHAR(255),
  date VARCHAR(50)
);
