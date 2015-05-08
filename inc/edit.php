<?php
    include('../inc/constants.php');
    include('../inc/GHS.php');
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = $GHS->query("SELECT * FROM content WHERE sid = $id");
        $data = $GHS->fetch($sql);
        foreach ($data as $content)
        {
            echo json_encode(array("content" => stripslashes($content['content']), "slideshow_ids" => $content['slideshow_ids']));
        }
    }
    if (isset($_POST['id']) && isset($_POST['content'])) {
        $data = addslashes($_POST['content']);
        $id = (int)$_POST['id'];
        $slideshow_ids = $_POST['slideshow_ids'];
        $sql = $GHS->query("UPDATE `content` SET `content` = '$data', `slideshow_ids` = '$slideshow_ids' WHERE `sid` = $id") or die(mysql_error());
        if ($sql) {
            echo 'Saved successfully.';
        } else {
            echo 'Error!';
        }
    }
?>