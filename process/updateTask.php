<?php
require_once __DIR__ . "/../load.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $task_id = $_POST['task_id'];

        if ($conn->query("SELECT * FROM tasks WHERE id='$task_id'")->num_rows <= 0) {
            throw new Exception("Failed to Get Task Data");
        }

        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $priority = $_POST['priority'];
        $status = $_POST['status'];
        $description = $_POST['description'];
        $due_date = $_POST['due_date'];

        $sql = "UPDATE tasks SET  
        name='$name',
        priority='$priority',
        status='$status',
        description='$description',
        due_date='$due_date'
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
