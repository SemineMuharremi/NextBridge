-- Skema e databazës për NextBridge (Kurse Online)
-- Importo në phpMyAdmin ose: mysql -u root -p < database/schema.sql

CREATE DATABASE IF NOT EXISTS kurseonline CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE kurseonline;

CREATE TABLE IF NOT EXISTS students (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    username   VARCHAR(50)  NOT NULL,
    email      VARCHAR(100) NOT NULL UNIQUE,
    password   VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS profesors (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    username   VARCHAR(50)  NOT NULL,
    email      VARCHAR(100) NOT NULL UNIQUE,
    password   VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS admini (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    username   VARCHAR(50)  NOT NULL,
    email      VARCHAR(100) NOT NULL UNIQUE,
    password   VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS courses (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    time        VARCHAR(50)  NOT NULL,
    info        TEXT,
    image       VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS contact_messages (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    full_name  VARCHAR(100) NOT NULL,
    email      VARCHAR(100) NOT NULL,
    subject    VARCHAR(150) NOT NULL,
    message    TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS subscribers (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    email      VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Të dhëna demo
INSERT INTO courses (course_name, time, info, image) VALUES
('Web Development', '10:00 - 12:00', 'Mëso HTML, CSS, JavaScript dhe PHP nga fillimi.', 'course-2.jpg'),
('Graphic Design',  '13:00 - 15:00', 'Krijo dizajne moderne dhe kreative.',            'course-3.jpg'),
('Piano',           '16:00 - 17:30', 'Mëso të luash piano me profesorë të certifikuar.', 'course-4.jpg');

-- Admin demo: email admin@nextbridge.com / fjalëkalimi: admin123
-- (Ndryshoje fjalëkalimin pas instalimit!)
INSERT INTO admini (username, email, password) VALUES
('admin', 'admin@nextbridge.com', '$2y$10$R0JwG0zkK8Eose5sPtK4/OYSC82KfCfHa0bBqky6ZFHF21kf7E1pG');
