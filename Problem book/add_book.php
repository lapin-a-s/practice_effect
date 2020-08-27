
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Курсы</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="authorization_problem_book.php">К авторизации <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="crudmodal.php">Просмотр задач/удаление <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
<section class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Создание задач</h4>
                        <a href="#" class="btn btn-primary create">Создать</a>
                    </div>
                </div>
            </div>
</section>
<div class="modal fade" id="cart">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Управление задачами</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="buy" method="post">
                    <div class="form-group">
                        <label for="login">Имя пользователя</label>
                        <input type="text" name="login" required class="form-control" id="login" >
                    </div>
                    <div class="form-group">
                        <label for="product">e-mail</label>
                        <input type="email" name="mail" class="form-control" id="mail" >
                    </div>
                    <div class="form-group">
                        <label for="price">текст задачи</label>
                        <input type="text" name="text" class="form-control" id="text">
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'problem_book';
$link = mysqli_connect($host,$user,$password,$db_name);
if(empty($_POST))
{
}
else
{
    $login = $_POST['login'];
    $mail = $_POST['mail'];
    $text = $_POST['text'];
    mysqli_query($link,"INSERT INTO task (`user_name`,`e-mail`,`text_of_the_task`) values ('$login','$mail','$text')");
    unset($_POST);
}
?>