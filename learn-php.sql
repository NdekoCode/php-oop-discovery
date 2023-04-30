-- Active: 1682778732944@@127.0.0.1@3306@learn-php
CREATE DATABASE IF NOT EXISTS `learn-php`;
CREATE TABLE IF NOT EXISTS `users`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(55) NOT NULL,
    lastName VARCHAR(55) NOT NULL,
    pseudo VARCHAR(55) NOT NULL,
    email VARCHAR(150) NOT NULL,
    AGE INT NOT NULL
) ENGINE = InnoDB CHARACTER SET `utf8mb4` COLLATE `utf8mb4_general_ci`;
INSERT INTO users(firstName, lastName, pseudo, email, age)
VALUES(
        "Arick",
        "Bulakali",
        "ndekocode@gmail.com",
        "Kryptonic",
        25
    ),
    (
        "André",
        "Tassy",
        "Serial_Killer",
        "serialkiller@unitedgamers.com",
        16
    ),
    (
        "Danny",
        "kool",
        "M@teo21",
        "top_secret@siteduzero.com",
        18
    ),
    (
        "Belange",
        "Ngolu",
        "Bibou",
        "bibou557@laposte.net",
        29
    );