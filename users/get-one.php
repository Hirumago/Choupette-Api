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

//$id = (array_key_exists('id', $_GET)) ? intval($_GET['id']) : null;
$id = (array_key_exists('id', $_GET)) ? $_GET['id'] : null;

if (empty($id)) {
    throw new Exception('Id needed');
}

$stm = $db->prepare('SELECT * FROM users WHERE id = :id');
$stm->bindParam(':id', $id, PDO::PARAM_INT);
$stm->setFetchMode(\PDO::FETCH_CLASS, 'User');
$stm->execute();
$user = $stm->fetch();

echo json_encode($user);

class User
{
    public int $id;
    public string $name;
}