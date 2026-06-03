CREATE TABLE register (
    register_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15),
    street VARCHAR(40),
    city VARCHAR(20),
    state CHAR(3),
    postcode CHAR(5)
);

CREATE TABLE enquiry (
    enquiry_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15),
    enquiry_type VARCHAR(50),
    comments TEXT
);

CREATE TABLE `order` (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    quantity INT NOT NULL,
    delivery_mode VARCHAR(20),
    payment_mode VARCHAR(20)
);