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
<form method="POST">
    <input type="number" name="user_id" placeholder="User ID" required>
    <input type="number" name="book_id" placeholder="Book ID" required>
    <button type="submit">Issue</button>
</form>
