<html>
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
    <!--Ссылки-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="authorization_problem_book.php">К авторизации <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="add_book.php">Создать задачу <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="updatemodal.php">Изменение задач<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
<form method="post">
<?php
session_start();
if($_SESSION['Logged'] == "Авторизирован") {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'problem_book';
    $link = mysqli_connect($host, $user, $password, $db_name);
    $strSQL = "SELECT `id`,`user_name`, `e-mail`, `text_of_the_task` FROM `task`";
    $query = mysqli_query($link, $strSQL);
//Вывод таблицы из БД
    $table = "<table id='tablef'  border=1 width = '600px' align=center>";
    $stage = 1;
    while ($row = mysqli_fetch_array($query)) {
        if ($stage % 2 == 0) ;
        $stage++;
        $table .= "<thead>";
        $table .= "<tr>";
        $table .= "<td ><input type='submit' id='idtext' name='idtext' value=" . $row['id'] . ">Удалить</td>";
        $table .= "<td >" . $row['user_name'] . "</td>";
        $table .= "<td >" . $row['e-mail'] . "</td>";
        $table .= "<td >" . $row['text_of_the_task'] . "</td>";
        $table .= "</tr>";
        $table .= "</thead>";
    }
    $table .= "</table>";
    echo $table;
//вызов функции
    if (isset($_POST['idtext'])) {
        $id = $_POST['idtext'];
        delete($id);
    }
    /*
     * Удаление
     */
    function delete($id)
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'problem_book';
        $link = mysqli_connect($host, $user, $password, $db_name);
        mysqli_query($link, "DELETE from `task` where id = '" . $id . "'");
    }
}
else
{
    header('Location: authorization_problem_book.php');
    exit();
}
?>
</form>
<!--Подключение Bootstrap/jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>