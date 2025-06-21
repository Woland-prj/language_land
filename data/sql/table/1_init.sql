CREATE TABLE IF NOT EXISTS applications
(
    id     INT                NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name   VARCHAR(255)       NOT NULL,
    email  VARCHAR(50) UNIQUE NOT NULL,
    course VARCHAR(50)        NOT NULL
);