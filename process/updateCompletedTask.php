<?php
require_once __DIR__ . "/../load.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $task_id = $_POST['task_id'];

        if ($conn->query("SELECT * FROM tasks WHERE id='$task_id'")->num_rows <= 0) {
            throw new Exception("Failed to Get Task Data");
        }
        $status = $_POST['status'];

        $sql = "UPDATE tasks SET  
        status='$status'
    
        WHERE
        id='$task_id'
        ";

        $conn->query($sql);

        set_flash('success', 'updated task success');
        redirect('/dashboard');
    } catch (Exception $th) {
        set_flash('error', $th->getMessage());
        redirect('/dashboard');
    }
}
