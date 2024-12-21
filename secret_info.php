<?php
include "db.php";
session_start(); // створюємо нову сесію або відновлюємо поточну
if (!isset($_SESSION['authorized'])) // перевіряємо правильність авторизації
{
    header("Location: authorize.php");
}
$users = loadUsers();
?>
<html>

<head>
    <title>Secret info</title>
    <style>
        h1 {
            color: #FF4B2B;
        }

        h2 {
            color: #FF416C;
        }

        a {
            color: #FF4B2B;
            text-decoration: none;
            transition: transform 0.5s;
        }

        a:hover {
            color: #a33724;
        }
    </style>
</head>
<body>
<h1>Secret info</h1>
<h2>Ім'я: <?php echo $_SESSION['login'] ?></h2>
<ul>
    <li><p>Пароль: <?php echo $_SESSION['passwd'] ?></p></li>
    <li><p>Роль на сайті: <?php echo $_SESSION['role'] ?></p></li>
</ul>
<br><a href="index.php">На головну</a><br/>
<a href='logout.php'>Вийти</a>
<h2>Всі користувачі сайту</h2>
<ul>
<?php foreach ($users as $login => $info) {?>
        <li>
            <p>Ім'я: <?php echo $login; ?></p>
            <p>Роль: <?php echo $info['role']; ?></p>
        </li><br/>
    <?php }?>
</ul>
</body>
</html>