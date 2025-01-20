<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

echo "Welcome, " . ($_SESSION['role'] === 'admin' ? 'Admin' : 'Student');
?>
<a href="books.php">Manage Books</a>
<a href="issue.php">Issue Book</a>
<a href="return.php">Return Book</a>
<a href="logout.php">Logout</a>
