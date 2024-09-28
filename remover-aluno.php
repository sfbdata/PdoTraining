<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($pdo);

$stmt = $pdo->query('SELECT * FROM students');
$studentDatalist = $stmt->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

foreach ($studentDatalist as $student) {
    $studentList[] = new Student(
        $student['id'],
        $student['name'],
        new DateTimeImmutable($student['birth_date'])
    );
}

foreach ($studentList as $student) {
   $studentRepository->remove($student);

}

var_dump($studentDatalist);


/*
$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id = ?');
$preparedStatement->bindValue(1, 2);
var_dump($preparedStatement->execute());

$preparedStatement->bindValue(1, 3);
var_dump($preparedStatement->execute());

$preparedStatement->bindValue(1, 4);
var_dump($preparedStatement->execute());

$preparedStatement->bindValue(1, 5);
var_dump($preparedStatement->execute());
*/

