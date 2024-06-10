<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP TECH BOOK</title>
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>PHP TECH BOOK</h1>
            <div>
                <a href="" class="btn btn btn-outline-primary">戻る</a>
            </div>
        </header>
        <form action="" method="post">
            <div class="form-element my-4">
                <input class="form-control" type="text" name="title" placeholder="本のタイトルを入力">
            </div>
            <div class="form-element my-4">
                <input class="form-control" type="text" name="author" placeholder="著者名を入力">
            </div>
            <div class="form-element my-4">
                <select name="type" class="form-control">
                    <option value="">本の種類を選択</option>
                    <option value="Fiction">フィクション</option>   
                    <option value="Mystery">ミステリー</option>
                    <option value="Language">語学</option>
                    <option value="SF">SF</option>
                    <option value="NonFiction">ノンフィクション</option>
                    <option value="Fantasy">ファンタジー</option>
                    <option value="Science">サイエンス</option>
                </select>
            </div>
            <div class="form-element my-4">
                <input class="form-control" type="text" name="description" placeholder="本の説明を入力">
            </div>
            <div class="form-element">
                <input class="btn btn-primary" type="submit" name="create" value="登録する" placeholder="本のタイトルを入力">
            </div>
        </form>
    </div>
</body>

</html>