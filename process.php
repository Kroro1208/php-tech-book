<?php
include("connect.php");
if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $sql = "INSERT INTO books (title, author, category, description) VALUES ('$title', '$author', '$category', '$description')";
    if (mysqli_query($conn, $sql)) {
        echo "データが登録されました";
    } else {
        die("エラーが発生しました");
    }
}
