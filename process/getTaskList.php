<?php
require_once __DIR__ . '/../load.php';
if (!empty(auth()->id)) {
    $user_id = auth()->id;
    $sql = "SELECT * FROM tasks WHERE user_id = $user_id ";
    $result = $conn->query($sql);
    $events = [];

    while ($row = $result->fetch_assoc()) {
        $bg = statusColor($row['status']);
        $events[] = [
            'title' => $row['name'],
            'start' =>  date('c', strtotime($row['created_at'])),
            'end' => date('c', strtotime($row['due_date'])),
            'className' => "bg-$bg",
        ];
    }

    $eventsJson = json_encode($events);
}
