<?php
    include ('inc/constants.php');
    include('inc/GHS.php');
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>
<!Doctype HTML>
<html>
    <head>
        <title>GHS - Downloads</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link href='http://fonts.googleapis.com/css?family=Quicksand|Milonga' rel='stylesheet' type='text/css' />
    </head>
    <body>
        <div id="downloads-section">
            <a href="home.php" class="small-link" style="float: right;">Back to Home</a>
            <h1>List of Downloads</h1>
            <h3>Newsletters</h3>
            <?php
            $sql_n = $GHS->query("SELECT * FROM newsletters ORDER BY id DESC");
            if ($GHS->num_rows($sql_n) == 0) {
                echo '<p>No current newsletters.</p>';
            } else {
                echo '<ul>';
                $nots = $GHS->fetch($sql_n);
                foreach ($nots as $not) {
                    echo '<li><a href="'.$not['link'].'">'.stripslashes($not['title']).'</a></li>';
                }
                echo '</ul>';
            }
            ?>
            <h3>Notices</h3>
            <?php
            $sql_n = $GHS->query("SELECT * FROM notices ORDER BY id DESC");
            if ($GHS->num_rows($sql_n) == 0) {
                echo '<p>No current notices.</p>';
            } else {
                echo '<ul>';
                $nots = $GHS->fetch($sql_n);
                foreach ($nots as $not) {
                    echo '<li><a href="'.$not['link'].'">'.stripslashes($not['title']).'</a></li>';
                }
                echo '</ul>';
            }
            ?>
            <h3>School Song</h3>
            <ul>
                <li><a href="assets/ghs_theme_song.mp3">Audio File (MP3)</a></li>
                <li><a href="assets/ghs_theme_song.ogg">Audio File (OGG)</a></li>
                <li><a href="#">Lyrics</a></li>
            </ul>
        </div>
    </body>
</html>
