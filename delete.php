<?php
session_start();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    include("connect.php");

    // プリペアドステートメントを使用してSQLインジェクションを防ぐ
    $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // 削除成功後にリダイレクト
        $_SESSION["msg"] = "本の削除が成功しました";
        header("Location: index.php");
        exit();
    } else {
        // 削除失敗の場合、エラーメッセージを表示
        echo "データの削除に失敗しました: " . $stmt->error;
    }

    // ステートメントと接続を閉じる
    $stmt->close();
    $conn->close();
} else {
    echo "IDが指定されていません。";
}
