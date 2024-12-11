<?php
include_once __DIR__ . "/../load.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (empty($name) || empty($email) || empty($password)) {
            throw new Exception('isi semua data dangan benar');
        }

        $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
        $result = $conn->query($sql);

        set_flash('success', 'Register Success');
        return redirect('/login');
    } catch (Exception $e) {
        set_flash('error', $e->getMessage());
        return redirect('/register');
    }
}
