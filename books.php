<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $copies = $_POST['copies'];

    $stmt = $conn->prepare("INSERT INTO books (title, author, isbn, copies) VALUES (:title, :author, :isbn, :copies)");
    $stmt->execute(['title' => $title, 'author' => $author, 'isbn' => $isbn, 'copies' => $copies]);
}

$books = $conn->query("SELECT * FROM books")->fetchAll();
?>
<h1>Books</h1>
<table>
    <tr><th>Title</th><th>Author</th><th>ISBN</th><th>Copies</th></tr>
    <?php foreach ($books as $book): ?>
    <tr>
        <td><?= $book['title'] ?></td>
        <td><?= $book['author'] ?></td>
        <td><?= $book['isbn'] ?></td>
        <td><?= $book['copies'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<form method="POST">
    <input type="text" name="title" placeholder="Book Title" required>
    <input type="text" name="author" placeholder="Author" required>
    <input type="text" name="isbn" placeholder="ISBN" required>
    <input type="number" name="copies" placeholder="Copies" required>
    <button type="submit" name="add_book">Add Book</button>
</form>
