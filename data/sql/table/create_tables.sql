CREATE DATABASE IF NOT EXISTS blog;
USE blog;

CREATE TABLE posts (
                       id INT UNSIGNED AUTO_INCREMENT,
                       user_id INT UNSIGNED NOT NULL,
                       likes_count INT UNSIGNED NOT NULL DEFAULT 0,
                       description MEDIUMTEXT DEFAULT NULL,
                       posted_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

                       PRIMARY KEY (id),
                       FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)
    CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE users(
                      id INT UNSIGNED AUTO_INCREMENT,
                      name VARCHAR(50) NOT NULL,
                      surname VARCHAR(50) NOT NULL,
                      email VARCHAR(100) NOT NULL,
                      username VARCHAR(100) DEFAULT NULL,
                      avatar_url VARCHAR(255) DEFAULT NULL,
                      password VARCHAR(255) NOT NULL,
                      PRIMARY KEY (id),
                      UNIQUE (email),
                      UNIQUE (username)
)
    CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE post_images (
                             id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                             post_id INT UNSIGNED NOT NULL,
                             image_path VARCHAR(255) NOT NULL,
                             position INT NOT NULL,
                             FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
                             UNIQUE(post_id, position)
)
    CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

