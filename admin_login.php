<?php
    include ('inc/constants.php');
    include('inc/GHS.php');
    if (isset($_SESSION['username'])) header("location:admin.php");
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (isset($_POST['submit'])) {
        $username = mysql_real_escape_string($_POST['username']);
        $password = sha1($_POST['pw']);
        if (!$username || !$_POST['pw']) {
            echo 'Please fill in properly!';
        } else {
            $logged_in = $GHS->secure_login($username, $password);
            if ($logged_in) {
                $_SESSION['username'] = $username;
                header("location:admin.php");
            } else {
                echo 'Error logging in!';
            }
        }
    }
?>
<!Doctype HTML>
<html>
    <head>
        <title>Garden High School</title>
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/css/admin.css" />
        <script type="text/javascript" src="<?=BASE_URL?>/js/jquery.js"></script>
    </head>
    <body>
        <div id="header">
            <h1>Garden High School - Admin</h1>
        </div>
        <div id="container">
            <form method="post" action="admin_login.php">
                <p>Username</p>
                <input type="text" name="username" />
                <p>Password</p>
                <input type="password" name="pw" />
                <p><input type="submit" name="submit" value="Login" /></p>
            </form>
        </div>
        <script type="text/javascript" src="<?=BASE_URL?>/js/functions.js"></script>
    </body>
</html>