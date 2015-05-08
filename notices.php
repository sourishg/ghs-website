<?php
    include ('inc/constants.php');
    include('inc/GHS.php');
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    $sql_n = $GHS->query("SELECT * FROM notices ORDER BY id DESC");
    if ($GHS->num_rows($sql_n) == 0) {
        echo '<a href="#" style="float:right; margin-right: 10px; margin-top: 6px;" class="small-link" onclick="closeNotice(); return false;">Close</a><h3>No current notices.</h3>';
    } else {
        echo '<a href="#" style="float:right; margin-right: 10px; margin-top: 6px;" class="small-link" onclick="closeNotice(); return false;">Close</a><h3>NOTICES</h3>';
        echo '<ul>';
        $nots = $GHS->fetch($sql_n);
        foreach ($nots as $not) {
            echo '<li><a href="'.$not['link'].'">'.stripslashes($not['title']).'</a></li>';
        }
        echo '</ul>';
    }
?>