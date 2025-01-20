<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];

    $stmt = $conn->prepare("INSERT INTO transactions (user_id, book_id, issue_date) VALUES (:user_id, :book_id, CURDATE())");
    $stmt->execute(['user_id' => $user_id, 'book_id' => $book_id]);

    $stmt = $conn->prepare("UPDATE books SET copies = copies - 1 WHERE id = :book_id");
    $stmt->execute(['book_id' => $book_id]);
}
?>
<!-- <form method="POST">
    <input type="number" name="user_id" placeholder="User ID" required>
    <input type="number" name="book_id" placeholder="Book ID" required>
    <button type="submit">Issue</button>
</form> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Library Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Library Management System</h2>
        <form action="process_login.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>

