<?php

$host = 'localhost';
$username = 'id21321487_kevin';
$password = ':MixGQ(mj294;4';
$dbName = 'id21321487_database';

$db = new PDO(
    'mysql:host=' . $host . ';dbname=' . $dbName . ';charset=utf8',
    $username,
    $password
);

$stm = $db->prepare('SELECT * FROM users');
$stm->execute();
$users = $stm->fetchAll(\PDO::FETCH_CLASS, 'User');

echo json_encode($users);

class User
{
    public int $id;
    public string $name;
}