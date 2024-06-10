<?php
include("connect.php");

if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    // プリペアドステートメントを使用
    $stmt = $conn->prepare("INSERT INTO books (title, author, category, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $author, $category, $description);

    if ($stmt->execute()) {
        echo "データが登録されました";
    } else {
        die("エラーが発生しました: " . $stmt->error);
    }

    $stmt->close();
}

$conn->close();
