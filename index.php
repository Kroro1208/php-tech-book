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
                <a href="create.php" class="btn btn btn-primary">本を追加する</a>
            </div>
        </header>
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
                $sql = "SELECT * FROM books";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["title"] ?></td>
                        <td><?php echo $row["author"] ?></td>
                        <td><?php echo $row["category"] ?></td>
                        <td>
                            <a href="view.php?id=<?php echo $row["id"] ?>" class="btn btn-info">本の詳細を観る</a>
                            <a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-warning">編集する</a>
                            <a href="" class="btn btn-danger">削除する</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>