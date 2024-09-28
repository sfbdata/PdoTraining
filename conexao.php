<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;
require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);




$connection->exec("INSERT INTO phones (area_code, number, student_id) VALUES ('61', '999999999', '1'), ('61','222222222', '1')");
echo 'Conectei';
exit();


$createtableSql =
    'CREATE TABLE IF NOT EXISTS students (
    id INTEGER PRIMARY KEY, 
    name TEXT, 
    birth_date TEXT
    );

    CREATE TABLE IF NOT EXISTS phones (
        id integer PRIMARY KEY,
        area_code TEXT,
        number TEXT,
        student_id INTEGER,
        FOREIGN KEY (student_id) REFERENCES students(id)
    );
';

$connection->exec($createtableSql);

