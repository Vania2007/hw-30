<?php
session_start(); // створюємо нову сесію або відновлюємо поточну
if (!isset($_SESSION['authorized'])) // перевіряємо правильність авторизації
{
    header("Location: authorize.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
    <link rel="stylesheet" href="style.css">
    <style>
        h1 {
    font-size: 2em;
    margin-bottom: 10px;
}

h2 {
    font-size: 1.5em;
    margin-bottom: 20px;
}
a {
          display: inline-block;
          padding: 10px 20px;
          background: #FF4B2B;
          color: white;
          border-radius: 5px;
          transition: all 0.3s;
      }
      a:hover {
          background: #FF416C;
      }
ul {
    list-style-type: none;
    padding: 0;
}

li {
    background: #fff;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
    </style>
</head>
<body>
    <h1>Привіт, <?=$_SESSION['login']?>!</h1>
    <h2>Ви успішно авторизувалися!</h2>
    <ul>
        <li><p>Ваш нік: <?=$_SESSION['login']?></p></li>
        <li><p>Ваша роль на сайті: <?=$_SESSION['role']?></p></li>
    </ul>
    <a href="index.php">На головну</a>
    <a href="logout.php">Вихід</a>
</body>
</html>