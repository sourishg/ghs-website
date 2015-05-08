<?php
    include ('../inc/constants.php');
    include('../inc/GHS.php');
    if (!isset($_SESSION['username'])) header("location:admin_login.php");
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $type = $_POST['type'];
    if ($type == 1) {
        $data = $_POST['main_link'];
        $permalink = $GHS->createPermalink($data);
        if ($GHS->query("INSERT INTO `main_links` VALUES('', '$data', '$permalink')")) {
            echo 'Link successfully added.';
        } else {
            echo 'Error';
        }
    } else if ($type == 2) {
        $mid = (int)mysql_real_escape_string($_POST['mid']);
        $data = $_POST['sub_link'];
        $permalink = $GHS->createPermalink($data);
        $data = htmlspecialchars($data);
        if ($GHS->query("INSERT INTO `sub_links` VALUES('', '$mid', '$data', '$permalink')")) {
            echo 'Sublink successfully added.';
        } else {
            echo 'Error';
        }
    } else if ($type == 3) {
        $sid = (int)mysql_real_escape_string($_POST['sid']);
        $mid = $GHS->getMidFromSid($sid);
        $data = addslashes($_POST['content']);
        $slideshow_ids = $_POST['slideshow_ids'];
        if ($GHS->query("INSERT INTO `content` VALUES('', '$mid', '$sid', '".addslashes($data)."', '$slideshow_ids')")) {
            echo 'Content successfully added.';
        } else {
            echo 'Error';
        }
    } else {
        $dept_name = mysql_real_escape_string($_POST['dept_name']);
        $dept_emails = mysql_real_escape_string($_POST['dept_emails']);
        if ($GHS->query("INSERT INTO query_departments VALUES('', '$dept_name', '$dept_emails')")) {
            echo 'Department added successfully.';
        } else {
            echo 'Could not add.';
        }
    }
?>
