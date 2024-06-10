<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>編集ページ</title>
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>本の編集</h1>
            <div>
                <a href="index.php" class="btn btn btn-outline-primary">戻る</a>
            </div>
        </header>
        <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            include("connect.php");
            $sql = "SELECT * FROM books WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        ?>
            <form action="process.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- IDを渡す隠しフィールド -->
                <div class="form-element my-4">
                    <input class="form-control" type="text" name="title" value="<?php echo htmlspecialchars($row["title"], ENT_QUOTES, 'UTF-8'); ?>" placeholder="本のタイトルを入力">
                </div>
                <div class="form-element my-4">
                    <input class="form-control" type="text" name="author" value="<?php echo htmlspecialchars($row["author"], ENT_QUOTES, 'UTF-8'); ?>" placeholder="著者名を入力">
                </div>
                <div class="form-element my-4">
                    <select name="category" class="form-control">
                        <option value="">本の種類を選択</option>
                        <option value="Fiction" <?php if ($row["category"] == "Fiction") {
                                                    echo "selected";
                                                } ?>>フィクション</option>
                        <option value="Mystery" <?php if ($row["category"] == "Mystery") {
                                                    echo "selected";
                                                } ?>>ミステリー</option>
                        <option value="Language" <?php if ($row["category"] == "Language") {
                                                        echo "selected";
                                                    } ?>>語学</option>
                        <option value="SF" <?php if ($row["category"] == "SF") {
                                                echo "selected";
                                            } ?>>SF</option>
                        <option value="NonFiction" <?php if ($row["category"] == "NonFiction") {
                                                        echo "selected";
                                                    } ?>>ノンフィクション</option>
                        <option value="Fantasy" <?php if ($row["category"] == "Fantasy") {
                                                    echo "selected";
                                                } ?>>ファンタジー</option>
                        <option value="Science" <?php if ($row["category"] == "Science") {
                                                    echo "selected";
                                                } ?>>サイエンス</option>
                        <option value="Tech" <?php if ($row["category"] == "Tech") {
                                                    echo "selected";
                                                } ?>>テクノロジー</option>
                    </select>
                </div>
                <div class="form-element my-4">
                    <input class="form-control" type="text" name="description" value="<?php echo htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8'); ?>" placeholder="本の説明を入力">
                </div>
                <div class="form-element">
                    <input class="btn btn-primary" type="submit" name="edit" value="更新する">
                </div>
            </form>
        <?php
        } else {
            echo "<div class='alert alert-danger'>IDが指定されていません。</div>";
        }
        ?>
    </div>
</body>

</html>