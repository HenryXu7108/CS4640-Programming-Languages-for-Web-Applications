<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Wenhao Xu(wx8mcm)">
    <meta name="description" content="gameover fail page">
    <title>Wordle Gameover Fail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 15px;">
    <div class="row col-xs-8">
        <h1>Wordle - Game Over</h1>
        <h2 style="text-align: center;">Game Failed</h2>
        <h3>
            Hello <?=$_SESSION["name"]?><br>
            Score: <?=$_SESSION["score"]?><br>
            Target Word: <?=$_SESSION["answer"]?>
        </h3>
    </div>
    <div class="text-center">
        <a href="?command=playagain" class="btn btn-primary">Play Again</a>
        <a href="?command=logout" class="btn btn-danger">Exit Game</a>
    </div>
</div>

</body>
</html>
