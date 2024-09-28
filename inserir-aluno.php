<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$student = new Student(
    null,
    'Edlúcia Lins',
    new \DateTimeImmutable('1994-10-27'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?,?);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));

if ($statement->execute()){
    echo "aluno incluído com sucesso!";
}

