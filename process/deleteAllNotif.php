<?php
require_once __DIR__ . "/../load.php";

try {
    $user_id = auth()->id;

    $sql = "DELETE FROM notifications WHERE user_id='$user_id'";
    $conn->query($sql);
    return redirect('/dashboard');
} catch (\Throwable $th) {
    return redirect('/dashboard');
}
