CREATE DATABASE IF NOT EXISTS lms_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE lms_db;
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    instructor VARCHAR(100) NOT NULL,
    duration_hours INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE enrollments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        course_id INT NOT NULL,
        student_name VARCHAR(100) NOT NULL,
        student_email VARCHAR(100),
        enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);
INSERT INTO courses (title, description, instructor, duration_hours) VALUES
('أساسيات تطوير الويب', 'دورة شاملة لتعليم HTML و css و JavaScript من الصفر','م. خالد يوسف' 40),
('إدارة قواعد البيانات', 'مقدمة عملية في تصميم و إجارة قواعد بيانات MYSQL', 'م. مني العالي',25);    