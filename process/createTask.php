<?php

require_once __DIR__ . "/../load.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $priority = $_POST['priority'];
        $description = $_POST['description'];
        $due_date = $_POST['due_date'];

        $sql = "INSERT INTO tasks 
        (user_id , name , priority , description , due_date) 
        VALUES
        ('$user_id' , '$name' , '$priority' , '$description' , '$due_date')";

        $result = $conn->query($sql);
        set_flash('success', 'create new task success');
        redirect('/dashboard');
    } catch (Exception $th) {
        set_flash('error', $th->getMessage());
        redirect('/dashboard');
    }
}
