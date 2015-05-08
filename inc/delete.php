<?php
    include ('constants.php');
    include('GHS.php');
    if (!isset($_SESSION['username'])) header("location:admin_login.php");
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (mysql_real_escape_string($_GET['ref']) == "img") {
        $id = (int)mysql_real_escape_string($_GET['id']);
        $sql = $GHS->query("SELECT link FROM images WHERE id = $id LIMIT 1");
        $img = $GHS->fetch($sql);
        foreach ($img as $i) {
            $filename = '../' . stripslashes($i['link']);
            echo $filename;
            unlink($filename);
            $sql2 = $GHS->query("DELETE FROM images WHERE id = $id LIMIT 1");
            if ($sql2) {
                echo '<br />File Deleted. <a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
            }
        }
    } else if (mysql_real_escape_string($_GET['ref']) == "sublink") {
        $id = (int)mysql_real_escape_string($_POST['d_select_sublink']);
        if ($id) {
            $sql = $GHS->query("DELETE FROM sub_links WHERE id = $id LIMIT 1");
            echo 'Sub link deleted.<br /><a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
        } else {
            echo 'Select a proper sub link.<br /><a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
        }
    } else if (mysql_real_escape_string($_GET['ref']) == "content") {
        $id = (int)mysql_real_escape_string($_POST['d_select_content']);
        if ($id) {
            $sql = $GHS->query("DELETE FROM content WHERE id = $id LIMIT 1");
            echo 'Content deleted.<br /><a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
        } else {
            echo 'Select a proper content.<br /><a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
        }
    } else if (mysql_real_escape_string($_GET['ref']) == "notice") {
        $id = (int)mysql_real_escape_string($_POST['d_select_notice']);
        $sql = $GHS->query("SELECT * FROM notices WHERE id = $id");
        $data = $GHS->fetch($sql);
        $notice = "../";
        foreach ($data as $value) {
            $notice .= stripslashes($value['link']);
        }
        if ($id) {
            $sql = $GHS->query("DELETE FROM notices WHERE id = $id LIMIT 1");
            unlink($notice);
            echo 'Notice deleted.<br /><a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
        } else {
            echo 'Select a proper notice.<br /><a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
        }
    } else if (mysql_real_escape_string($_GET['ref']) == "newsletter") {
        $id = (int)mysql_real_escape_string($_POST['d_select_newsletter']);
        $sql = $GHS->query("SELECT * FROM newsletters WHERE id = $id");
        $data = $GHS->fetch($sql);
        $notice = "../";
        foreach ($data as $value) {
            $notice .= stripslashes($value['link']);
        }
        if ($id) {
            $sql = $GHS->query("DELETE FROM newsletters WHERE id = $id LIMIT 1");
            unlink($notice);
            echo 'Newsletter deleted.<br /><a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
        } else {
            echo 'Select a proper newsletter.<br /><a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
        }
    } else if (mysql_real_escape_string($_GET['ref']) == "update") {
        $id = (int)mysql_real_escape_string($_POST['d_select_update']);
        $sql = $GHS->query("SELECT * FROM updates WHERE id = $id");
        $data = $GHS->fetch($sql);
        $notice = "../";
        foreach ($data as $value) {
            $notice .= stripslashes($value['link']);
        }
        if ($id) {
            $sql = $GHS->query("DELETE FROM updates WHERE id = $id LIMIT 1");
            unlink($notice);
            echo 'Update deleted.<br /><a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
        } else {
            echo 'Select a proper update.<br /><a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
        }
    } else if (mysql_real_escape_string($_GET['ref']) == "dept") {
        $id = (int)mysql_real_escape_string($_POST['d_select_dept']);
        if ($id) {
            $sql = $GHS->query("DELETE FROM query_departments WHERE id = $id LIMIT 1");
            echo 'Department deleted.<br /><a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
        } else {
            echo 'Select a proper department.<br /><a href="'.BASE_URL.'/admin.php?mode=3">Go Back</a>';
        }
    }
?>