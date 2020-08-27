<html>
<head>
    <style>
    </style><title>База</title></head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<body>
<form class="col-md-4 col-sm-6" method="post">
    <div  class="from-control form-group">
        <label for="">Логин</label>
    <input name="login" type="text" required class="form-control" placeholder="Введите логин" >
           <label for="">Пароль</label>
    <input name="pasword" required class="form-control"  type="text" placeholder="Введите пароль" >
        <label for="">Подтверждение пароля</label>
    <input name="reset" required class="form-control"  type="text" placeholder="Подтвердите пароль" >
        <button class="btn btn-success form-control" style="margin-top: 15px"  type="submit">Авторизироваться</button>
    </div>
</form>
<?php
$id = 0;
if(empty($_POST)) exit;
else
{
    $password = strlen($_POST['pasword']);
    if(($password > 6) && ($password < 12) && (isset($_POST["login"])) && ($_POST['pasword'] == $_POST['reset']))
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'problem_book';
        $link = mysqli_connect($host,$user,$password,$db_name);
        $login = $_POST['login'];
        $pas = $_POST['pasword'];
        $checklog = mysqli_query($link,"SELECT * from authorization where login = '".$login."' AND password = '".$pas."'");
        if(mysqli_num_rows($checklog) == 1)
        {
        session_start();
        $_SESSION['Logged'] = "Авторизирован";
        header('Location: add_book.php');
        exit();
        }
        else
        {
            session_abort();
        session_start();
        $_SESSION['Logged'] = "Неавторизован";
        echo "Запись не внесенна, проверьте правильность заполнения полей.";
        }
        }
        else if($password < 6)
        {
            session_abort();
            session_start();
            $_SESSION['Logged'] = "Неавторизован";
        echo "Пароль меньше 6<br>";
        }
        else if($password > 12)
        {
            session_abort();
            session_start();
            $_SESSION['Logged'] = "Неавторизован";
        echo "Пароль больше 12<br>";
        }
    }
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
