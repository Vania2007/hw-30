<?php
ob_start();
include "db.php";
session_start();
$users = loadUsers();?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Authorize</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Authorize</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
    <?php
if (!isset($_GET['go'])) {?>
    <div class='container' id='container'>
	<div class='form-container sign-up-container'>
		<form>
			<h1>Create Account</h1>
			<input type='text' placeholder='Name' name='login' required/>
			<input type='password' placeholder='Password' name='passwd' required/>
            <input type='hidden' name='register' value='1'/>
			<input type='submit' class="btn btn-change-auth" name='go' value='Sign Up'>
		</form>
	</div>
	<div class='form-container sign-in-container'>
		<form>
			<h1>Sign in</h1>
			<input type='text' placeholder='Name' name='login' required/>
			<input type='password' placeholder='Password' name='passwd' required/>
            <input type='submit' class="btn btn-change-auth" name='go' value='Sign In'>
            <?php
if (isset($_SESSION['err']) && ($_SESSION['err'] == 1)) {
    $_SESSION['err'] = 0;
    echo 'Неправильний логін чи пароль, спробуйте ще раз!<br>';
}?>
		</form>
	</div>
	<div class='overlay-container'>
		<div class='overlay'>
			<div class='overlay-panel overlay-left'>
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class='ghost btn-change-auth' id='signIn'>Sign In</button>
			</div>
			<div class='overlay-panel overlay-right'>
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class='ghost btn-change-auth' id='signUp'>Sign Up</button>
			</div>
		</div>
	</div>
</div>
  <script  src="./script.js"></script>
</body>
</html>
<?php } else {
    $login = $_GET['login'];
    $passwd = $_GET['passwd'];

    if (isset($_GET['register'])) {
        if (!isset($users[$login])) {
            $users[$login] = ['pass' => password_hash($passwd, PASSWORD_DEFAULT), 'role' => 'user'];
            saveUsers($users);
            $_SESSION['login'] = $login;
            $_SESSION['passwd'] = $passwd;
            $_SESSION['role'] = 'user';
            $_SESSION['authorized'] = 1;
            header("Location: hello.php");
        } else {
            $_SESSION['err'] = 1;
            header("Location: authorize.php");
        }
    } else {
        if (isset($users[$login]) && password_verify($passwd, $users[$login]['pass'])) {
            $_SESSION['login'] = $login;
            $_SESSION['passwd'] = $passwd;
            $_SESSION['role'] = $users[$login]['role'];
            $_SESSION['authorized'] = 1;
            if ($_SESSION['role'] == "admin") {
                header("Location: secret_info.php");
            } else {
                header("Location: hello.php");
            }
        } else {
            $_SESSION['err'] = 1;
            header("Location: authorize.php");
        }
    }
}