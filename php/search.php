<?php
include_once '../initialize.php';
$post = new Post($db);
$dados = file_get_contents("php://input");
$object = json_decode($dados);
$banana = $post -> cadastroReceita($object);
echo json_encode($banana);
?>