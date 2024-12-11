<?php
include_once __DIR__ . "/../load.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            throw new Exception('isi semua data dangan benar');
        }

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows <= 0) {
            throw new Exception("login failed , wrong email or password");
        }

        $user = $result->fetch_object();

        if (!password_verify($password, $user->password)) {
            throw new Exception("login failed , wrong email or password");
        }

        $_SESSION['auth'] = $user;


        $user_id = $user->id;

        $taskResult = $conn->query("SELECT * FROM tasks WHERE user_id='$user_id' AND due_date < NOW()");
        if ($taskResult->num_rows > 0) {
            while ($task = $taskResult->fetch_object()) {
                $task_id = $task->id;
                $title = "Task Terlewatkan";
                $content = "Task <b class='text-danger'>{$task->name}</b> terlewatkan";
                $escapedContent = $conn->real_escape_string($content);
                $due_date = $task->due_date;

                // Masukkan notifikasi ke dalam tabel notifications
                $notifSql = "INSERT INTO notifications (user_id, title, content,due_date) VALUES ('$user_id', '$title', '$escapedContent' , '$due_date')";
                $conn->query($notifSql);
            }
        }
        set_flash('success', "Login Success Welcome <b> $user->name</b>");
        return redirect('/dashboard');
    } catch (Exception $e) {
        set_flash('error', $e->getMessage());
        return redirect('/login');
    }
}
