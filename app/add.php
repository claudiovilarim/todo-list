<?php

require_once '../db_conn.php';

if(isset($_POST['title'])){
    $title = $_POST['title'];

    //insert data
    $stmt = $conn->prepare("INSERT INTO todo_list.todos (title) VALUES (?)");
    $stmt->execute([$title]);

    header('Location: ../index.php?mess=enviado');

    $conn = null;
    exit();


}