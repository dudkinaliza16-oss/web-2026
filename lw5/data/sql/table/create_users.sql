CREATE DATABASE IF NOT EXISTS blog;
USE blog;
CREATE TABLE users(
     id INT UNSIGNED AUTO_INCREMENT,
     name VARCHAR(50) NOT NULL,
     surname VARCHAR(50) NOT NULL,
     email VARCHAR(255) NOT NULL,
     username VARCHAR(100) DEFAULT NULL,
     avatar_url VARCHAR(255) DEFAULT NULL,
     password VARCHAR(255) NOT NULL,
     PRIMARY KEY (id),
     UNIQUE (email),
     UNIQUE (username)
)
    CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;