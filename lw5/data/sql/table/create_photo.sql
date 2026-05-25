CREATE DATABASE IF NOT EXISTS blog;
USE blog;
CREATE TABLE post_images (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id INT UNSIGNED NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    position INT NOT NULL,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    UNIQUE(post_id, position)
)
CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

