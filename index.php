<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login_view.php");
}
header("Location: todo_view.php");
