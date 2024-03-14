<?php
const DB_HOST = 'localhost';
const DB_NAME = 'test_base';
const DB_USER = 'user1';
const DB_PASS = 'pass1';
const CHARSET = 'utf8mb4';

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . CHARSET;

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
