<?php

function session($key)
{
    if (isset($_SESSION[$key])) {

        return $_SESSION[$key];
    } else {
        return null;
    }
}
function component($name, $params = [])
{
    $path = __DIR__ . "/components/$name.php";
    if (file_exists($path)) {
        extract($params);
        ob_start();
        include $path;
        return ob_get_clean();
    } else {
        return null;
    }
}

function redirect($location)
{
    header("Location: $location");
    exit();
}

function isLogin(): bool
{
    if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
        return true;
    }

    return false;
}

function auth()
{
    if (isLogin()) {
        return session('auth');
    }
}

function onlyAuth()
{
    if (!isLogin()) {
        redirect('/login');
    }
}
function onlyGuest()
{
    if (isLogin()) {
        if (auth()->role == 'user') {
            return   redirect('/dashboard');
        } else if (auth()->role == 'admin') {
            return   redirect('/admin');
        }
    }
}


function set_flash($key, $message)
{
    $_SESSION['flash'][$key] = $message;
}

function get_flash($key)
{
    if (isset($_SESSION['flash'][$key])) {
        $message = $_SESSION['flash'][$key];
        return $message;
    }
    return null;
}

function flash_error()
{
    if (!empty(get_flash('error'))) {
        echo '
        <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Error - </strong> ' . get_flash('error') . '
        </div>
        ';
        unset($_SESSION['flash']['error']);
    } else {
        return '';
    }
}

function flash_success()
{
    if (!empty(get_flash('success'))) {
        echo '
        <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Success - </strong> ' . get_flash('success') . '
        </div>
        ';
        unset($_SESSION['flash']['success']);
    } else {
        return '';
    }
}

function formatDate($date, $format = 'Y/m/d')
{
    return date_format(date_create($date), $format);
}

function dueDateCalculate($dueDateStr, $overdueMessage = 'Telah Lewat Selama', $lastOverdueMessage = 'Hari', $dueMessage = 'Hari Lagi')
{
    $timezone = new DateTimeZone('Asia/Makassar');
    $dueDate = new DateTime($dueDateStr, $timezone);
    $currentDate = new DateTime();
    $interval = $currentDate->diff($dueDate);

    $daysRemaining = $interval->days; // Total hari
    $isOverdue = $interval->invert;   // 1 jika lewat dari due_date, 0 jika belum

    if ($isOverdue) {
        return "{$overdueMessage} {$daysRemaining} {$lastOverdueMessage}";
    } else {
        return "{$daysRemaining} {$dueMessage}";
    }
}


function getTotalTimeSpent($createdAt)
{
    $timezone = new DateTimeZone('Asia/Makassar');

    $currentDate = new DateTime('now', $timezone);
    $createdDateTime = new DateTime($createdAt, $timezone);

    $interval = $currentDate->diff($createdDateTime);

    $days = $interval->days;
    $hours = $interval->h;
    $minutes = $interval->i;

    return "{$days}d {$hours}h {$minutes}min";
}



function statusColor($status)
{
    switch ($status) {
        case "new":
            return "info";
        case "completed":
            return "success";
        case "inprogress":
            return "primary";
        case "canceled":
            return "danger";
        default:
            return "info";
    }
}

function priorityColor($priority)
{
    switch ($priority) {
        case 'low':
            return 'info';
        case 'medium':
            return 'warning';
        case 'high':
            return 'danger';
        default:
            return 'info';
    }
}
