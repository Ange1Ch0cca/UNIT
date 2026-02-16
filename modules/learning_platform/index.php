<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: app/views/page/dashboard.php");
    exit;
} else {
    header("Location: app/views/home/login.php");
    exit;
}
