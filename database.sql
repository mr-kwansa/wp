CREATE DATABASE IF NOT EXISTS CompuShop;

USE CompuShop;

CREATE TABLE IF NOT EXISTS products (
    id INT(11) NOT NULL AUTO_INCREMENT,
    product_id VARCHAR(255) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    product_photo VARCHAR(255) NOT NULL,
    item_price DECIMAL(10,2) NOT NULL,
    product_info TEXT,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
