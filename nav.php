<?php
    include ('inc/constants.php');
    include('inc/GHS.php');
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if (isset($_GET['mid'])) {
        $mid = (int)($_GET['mid']);
        if ($mid != 0) {
        $sql = $GHS->query("SELECT * FROM sub_links WHERE mid = $mid");
                $info = $GHS->fetch($sql);
                $name = $GHS->getNameOfMainLink($mid);
                echo '<a href="#" style="float:right; margin-right: 10px; margin-top: 6px;" class="small-link" onclick="closeSmallNav(); return false;">Close</a><h3>'.$name.'</h3>';
                echo '<ul>';
                foreach ($info as $inf) {
                    echo '<li><a href="#'.$inf['permalink'].'" onclick="changeLoadedContent('.$inf['mid'].', '.$inf['id'].')">'.$inf['name'].'</a></li>';
                }
                echo '</ul>';
        }
    }
?>
