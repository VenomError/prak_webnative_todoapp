<?php

require_once __DIR__ . "/../load.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $id = $_POST['task_id'];

        $sql = "DELETE FROM tasks WHERE id='$id'";
        $result = $conn->query($sql);

        set_flash('success', 'deleted success');
        redirect('/dashboard');
    } catch (Exception $err) {
        set_flash('error', $err->getMessage());
        redirect('/dashboard');
    }
}
