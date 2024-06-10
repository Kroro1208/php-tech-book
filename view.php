<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>BOOK Details</title>
</head>

<body class="bg-light">
    <div class="container">
        <header class="bg-dark text-white rounded-3 p-3 my-4 d-flex justify-content-between align-items-center">
            <h1 class="mb-0">本の詳細</h1>
            <a href="index.php" class="btn btn-light">一覧へ戻る</a>
        </header>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <?php
                include("connect.php");

                if (isset($_GET["id"])) {
                    $id = $_GET["id"];

                    // プリペアドステートメントを使用
                    $stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($row = $result->fetch_assoc()) {
                ?>
                        <h2 class="card-title">タイトル</h2>
                        <p class="card-text"><?php echo htmlspecialchars($row["title"], ENT_QUOTES, 'UTF-8'); ?></p>
                        <h2 class="card-title">著者名</h2>
                        <p class="card-text"><?php echo htmlspecialchars($row["author"], ENT_QUOTES, 'UTF-8'); ?></p>
                        <h2 class="card-title">カテゴリー</h2>
                        <p class="card-text"><?php echo htmlspecialchars($row["category"], ENT_QUOTES, 'UTF-8'); ?></p>
                        <h2 class="card-title">詳細</h2>
                        <p class="card-text"><?php echo htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8'); ?></p>
                <?php
                    } else {
                        echo "<div class='alert alert-danger'>本が見つかりません。</div>";
                    }
                    $stmt->close();
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qLA80VrK1IptB7q50zk7SKWQbtAczI6O+uZ+7qTeiTtW6IN4QDD3I/tQpCJJa6M5" crossorigin="anonymous"></script>
</body>

</html>