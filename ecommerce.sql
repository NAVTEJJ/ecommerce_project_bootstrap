
CREATE DATABASE IF NOT EXISTS ecommerce_db;
USE ecommerce_db;

DROP TABLE IF EXISTS order_items;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2),
    image VARCHAR(255)
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT
);

-- Insert a default admin user (for demonstration you will use admin panel static login)
INSERT INTO users (name,email,password) VALUES
('Demo User','user@example.com', MD5('user123'));

INSERT INTO products (name,description,price,image) VALUES('Apple iPhone 14','Sleek smartphone with powerful A15 chip',699.00,'uploads/product1.jpg');
INSERT INTO products (name,description,price,image) VALUES('Samsung Galaxy S23','Flagship Android phone with AMOLED display',749.00,'uploads/product2.jpg');
INSERT INTO products (name,description,price,image) VALUES('Dell XPS 13','Compact premium ultrabook for professionals',999.00,'uploads/product3.jpg');
INSERT INTO products (name,description,price,image) VALUES('MacBook Air M2','Thin, light laptop with M2 performance',1199.00,'uploads/product4.jpg');
INSERT INTO products (name,description,price,image) VALUES('Sony WH-1000XM5','Industry-leading noise cancelling headphones',349.00,'uploads/product5.jpg');
INSERT INTO products (name,description,price,image) VALUES('Bose QuietComfort 45','Comfortable ANC headphones',299.00,'uploads/product6.jpg');
INSERT INTO products (name,description,price,image) VALUES('Apple Watch Series 9','Smartwatch with health sensors',399.00,'uploads/product7.jpg');
INSERT INTO products (name,description,price,image) VALUES('Samsung Galaxy Watch 6','Smartwatch with long battery life',329.00,'uploads/product8.jpg');
INSERT INTO products (name,description,price,image) VALUES('Logitech MX Master 3','Ergonomic wireless mouse for creators',99.00,'uploads/product9.jpg');
INSERT INTO products (name,description,price,image) VALUES('Anker PowerCore 20000','High-capacity portable power bank',49.00,'uploads/product10.jpg');
