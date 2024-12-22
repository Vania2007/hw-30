<?php
ob_start();
session_start();
isset($_SESSION['authorized']) ? $_SESSION['authorized'] = $_SESSION['authorized'] : $_SESSION['authorized'] = 0;
?>
<html>

<head>
    <title>My home page</title>
    <link rel="stylesheet" href="style.css">
    <style>
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
<?php
if ($_SESSION['authorized'] != 1) {?>
    <a href="authorize.php">Вхід</a>
    <?php } else {?>
      <ul>
        <li><p>Ваш нік: <?= $_SESSION['login']?></p></li>
        <li><p>Ваша роль на сайті: <?= $_SESSION['role']?></p></li>
    </ul>
<a href="logout.php">Вихід</a>
    <?php } ?>
</body>
</html>