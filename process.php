<?php
session_start(); // セッションを開始

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
        $_SESSION["msg"] = "本の登録が成功しました";
    } else {
        $_SESSION["msg"] = "エラーが発生しました: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
}

if (isset($_POST["edit"])) {
    $id = mysqli_real_escape_string($conn, $_POST["id"]); // 更新対象のIDを取得
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    // プリペアドステートメントを使用
    $stmt = $conn->prepare("UPDATE books SET title = ?, author = ?, category = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $title, $author, $category, $description, $id);

    if ($stmt->execute()) {
        $_SESSION["msg"] = "本の更新が成功しました";
    } else {
        $_SESSION["msg"] = "エラーが発生しました: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
}
