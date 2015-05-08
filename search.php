<?php

    include ('inc/constants.php');
    include('inc/GHS.php');
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    $terms = explode(" ", $_POST['sItem']);
    $sql = "SELECT * FROM sub_links WHERE name LIKE ";
    $a = 0;
    foreach ($terms as $term) {
        if ($a == 0) {
            $sql .= "'%$term%'";
            $a++;
        } else {
            $sql .= " OR name LIKE '%$term%'";
        }
    }
    $sql .= " ORDER BY id DESC";
    $res = $GHS->query($sql) or die(mysql_error());
    if (mysql_num_rows($res) > 0) {
        while ($row = mysql_fetch_assoc($res)) {
            $sample = "";
            $sql = $GHS->query("SELECT content FROM content WHERE sid = $row[id]");
            if ($GHS->num_rows($sql)) {
                $data = $GHS->fetch($sql);
                foreach ($data as $d) {
                    $sample = substr(strip_tags(stripslashes($d['content'])), 0, 100) . " ...";
                }
            }
            $title = stripslashes($row['name']);

            echo '
                <a href="#'.$row['permalink'].'" class="r_link" onclick="changeLoadedContent('.$row['mid'].', '.$row['id'].'); closeSearch();">
                <div class="result">
                    <p class="title">' . $title . '</p>
                    <p class="info">' . $sample . '</p>
                </div>
                </a>
            ';
        }
    } else {
        echo '<p class="no_results">Oops! No results found.</p>';
    }

?>