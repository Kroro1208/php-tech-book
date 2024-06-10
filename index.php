<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>BOOK List</title>
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>PHP TECH BOOK List</h1>
            <div>
                <a href="create.php" class="btn btn-primary">本を追加する</a>
            </div>
        </header>

        <?php
        session_start();
        if (isset($_SESSION['msg'])) {
            echo "<div class='alert alert-success'>{$_SESSION['msg']}</div>";
            unset($_SESSION['msg']); // メッセージを一度表示したらセッションから削除
        }
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>タイトル</th>
                    <th>著者名</th>
                    <th>カテゴリー</th>
                    <th>詳細</th>
                    <th>アクション</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("connect.php");
                $stmt = $conn->prepare("SELECT * FROM books");
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row["title"], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row["author"], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row["category"], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <a href="view.php?id=<?php echo $row["id"] ?>" class="btn btn-info">本の詳細を観る</a>
                            <a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-warning">編集する</a>
                            <a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">削除する</a>
                        </td>
                    </tr>
                <?php
                }

                $stmt->close();
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>