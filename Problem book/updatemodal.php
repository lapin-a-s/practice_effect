<?php
session_start();
if($_SESSION['Logged'] != "Авторизирован") {
        header('Location: authorization_problem_book.php');
        exit();
}
?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Изменение задачника</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!--HTML Ссылки -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="authorization_problem_book.php">К авторизации <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="crudmodal.php">Просмотр задач <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <!--HTML Карточка -->
    <section class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Редактирование задач</h4>
                            <a href="#" class="btn btn-primary update">Изменить</a>
                        </div>
                    </div>
                </div>
    </section>

    <!--HTML Модальное окно -->
    <div class="modal fade" id="update">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Управление Задачами</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="buy" method="post">
                        <div class="form-group">
                            <label for="login">ID</label>
                            <input type="text" name="id" required class="form-control" id="id" >
                        </div>
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
                        <a href="#" class="btn btn-primary delete">Удалить</a>
                        <button name="update" id="update" type="submit" class="btn btn-primary">Изменить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Подключение Bootstrap/jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    </body>
    </html>
<?php
    /*
     * Очистка - Чтение - добавление
     * */
    if (empty($_POST)) exit;
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'problem_book';
    $link = mysqli_connect($host, $user, $password, $db_name);
    $updatecheck = $_POST['update'];
    $login = $_POST['login'];
    $mail = $_POST['mail'];
    $text = $_POST['text'];
    $id = $_POST['id'];
    mysqli_query($link, "Update `task` set `user_name` = '$login',`e-mail` = '$mail', `text_of_the_task` = '$text' where `id` = '$id' ");
?>