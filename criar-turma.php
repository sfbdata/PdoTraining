<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);


$connection->beginTransaction();
$aluno1 = new Student(
    null,
    'Samuel Freitas',
    new DateTimeImmutable('1993-06-06')
);
$studentRepository->save($aluno1);

$aluno2 = new Student(
    null,
'Edlúcia Lins',
new DateTimeImmutable('1994-10-27')
);
$studentRepository->save($aluno2);

$connection->commit();