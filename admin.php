<?php
    include ('inc/constants.php');
    include('inc/GHS.php');
    if (!isset($_SESSION['username'])) header("location:admin_login.php");
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
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
            <p style="display:inline-block;">Mode: 
                <select id="sel_mode" onchange="change_mode();">
                    <option value="1" <?php if ($_GET['mode'] == 1 || !isset($_GET['mode'])){echo 'selected'; } ?>>Create</option>
                    <option value="2" <?php if ($_GET['mode'] == 2){echo 'selected';} ?>>Edit</option>
                    <option value="3" <?php if ($_GET['mode'] == 3){echo 'selected';} ?>>Delete</option>
                </select>
            </p>
            <p class="logout"><a href="admin_logout.php">Logout</a></p>
            <h2><span style="color:#09f;">
            <?php
                if (!isset($_GET['mode']) || (int)$_GET['mode'] == 1){
                    echo 'Create';
                } else if ((int)$_GET['mode'] == 2){
                    echo 'Edit';
                } else if ((int)$_GET['mode'] == 3) {
                    echo 'Delete';
                }
            ?>
            </span> Mode</h2>
            <div id="a_main">
                <?php
                    if ((int)mysql_real_escape_string($_GET['mode']) == 1 || !isset($_GET['mode'])) {
                ?>
                <h3>Add Main Links</h3>
                <input type="text" id="main_link_text" class="n_field" /><input type="submit" id="main_link_btn" value="Add Link" style="margin-left: 10px;" onclick="add_main_link();" />
                <h3>Add Sub Links</h3>
                <select id="sel_sub_link">
                    <option value="0">Select Main Link</option>
                    <?php
                        $sql = $GHS->query("SELECT * FROM `main_links`");
                        $links = $GHS->fetch($sql);
                        foreach ($links as $data) {
                            echo '<option value="'.$data['id'].'">' .$data['name']. '</option>';
                        }
                    ?>
                </select><p>Name:</p>
                <input type="text" id="sub_link_text" class="n_field" /><input type="submit" id="sub_link_btn" value="Add Sublink" style="margin-left: 10px;" onclick="add_sub_link();" />
                <h3>Add Content</h3>
                <select id="sel_contento">
                    <option value="0">Select Sub Link</option>
                    <?php
                        $sql = $GHS->query("SELECT * FROM `sub_links`");
                        $links = $GHS->fetch($sql);
                        foreach ($links as $data) {
                            echo '<option value="'.$data['id'].'">' .$data['name']. ' - ' .$GHS->getNameOfMainLink($data['mid']). '</option>';
                        }
                    ?>
                </select>
                <br />
                <p>Image IDs for slideshow (separated by comma)</p>
                <input type="text" id="slideshow_ids" class="n_field" />
                <p>Content:</p>
                <textarea id="sub_link_content" class="n_text"></textarea><br />
                <input type="submit" id="content_btn" value="Add Content" onclick="add_sub_link_content();" />
                <h3>Upload Image</h3>
                <p>(File size should be < 100kB)</p>
                <form action="inc/upload_file.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" id="file"><br />Title: 
                <input type="text" name="title" /><br />
                <input type="submit" name="submit" value="Upload">
                </form>
                
                <h3>Add Department (Query List)</h3>
                Department Name:
                <input type="text" id="dept_name" /><br />
                Department email list (comma separated):
                <input type="text" id="dept_emails" /><br />
                <input type="submit" id="dept_submit" value="Add Department" onclick="submit_dept();" />
                
                <h3>Add student email data</h3>
                <p>Upload a .csv file. (id, id_no, email_f, email_m, token)</p>
                <form action="inc/upload_file.php?ref=csv" method="post" enctype="multipart/form-data">
                <input type="file" name="csv_file" id="csv_file"><br />
                <input type="submit" name="csv_submit" value="Add">
                </form>
                
                <h3>Add Notice</h3>
                <p>(File size should be < 2MB)</p>
                <form action="inc/upload_file.php?ref=not" method="post" enctype="multipart/form-data">
                <input type="file" name="notice_file" id="notice_file"><br />Title: 
                <input type="text" name="notice_title" /><br />
                <input type="submit" name="notice_submit" value="Add">
                </form>
                
                <h3>Add Update</h3>
                <p>(File size should be < 5MB)</p>
                <form action="inc/upload_file.php?ref=upd" method="post" enctype="multipart/form-data">
                <input type="file" name="notice_file" id="update_file"><br />Title: 
                <input type="text" name="notice_title" /><br />
                <input type="submit" name="notice_submit" value="Add">
                </form>
                
                <h3>Add Newsletter</h3>
                <p>(File size should be < 10MB)</p>
                <form action="inc/upload_file.php?ref=newsletter" method="post" enctype="multipart/form-data">
                <input type="file" name="notice_file" id="update_file"><br />Title: 
                <input type="text" name="notice_title" /><br />
                <input type="submit" name="notice_submit" value="Add">
                </form>
                
                <?php
                    } else if ((int)mysql_real_escape_string($_GET['mode']) == 2) { 
                ?>
                
                <h3>Choose content to be edited</h3>
                <select id="editor_select" onchange="showEditor();">
                    <option value="0">Select...</option>
                    <?php
                        $sql = $GHS->query("SELECT * FROM `sub_links`");
                        $links = $GHS->fetch($sql);
                        foreach ($links as $data) {
                            echo '<option value="'.$data['id'].'">' .$data['name']. ' - ' .$GHS->getNameOfMainLink($data['mid']). '</option>';
                        }
                    ?>
                </select><br /><br />
                Slideshow IDs
                <br />
                <input type="text" name="slide_ids" id="slide_ids" class="n_field" /><br />
                Content<br />
                <textarea id="editor" name="editor" class="n_text"></textarea>
                <br /><br />
                <input type="submit" name="editor_submit" id="editor_submit" value="Save" onclick="submitEditedContent();" />
                
                <?php
                    } else if ((int)mysql_real_escape_string($_GET['mode']) == 3) {
                ?>
                <h3>Delete Sub links</h3>
                <form action="inc/delete.php?ref=sublink" method="post" onsubmit="return confirm('Do you really want to delete?');">
                <select name="d_select_sublink" id="d_select_sublink">
                    <option value="0">Select Sub Link</option>
                    <?php
                        $sql = $GHS->query("SELECT * FROM `sub_links`");
                        $links = $GHS->fetch($sql);
                        foreach ($links as $data) {
                            echo '<option value="'.$data['id'].'">' .$data['name']. ' - ' .$GHS->getNameOfMainLink($data['mid']). '</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="submit" value="Delete Sub link" />
                </form>
                
                <h3>Delete Content</h3>
                <form action="inc/delete.php?ref=content" method="post" onsubmit="return confirm('Do you really want to delete?');">
                <select name="d_select_content" id="d_select_content">
                    <option value="0">Select Content</option>
                    <?php
                        $sql = $GHS->query("SELECT id, sid, mid FROM `content`");
                        $links = $GHS->fetch($sql);
                        foreach ($links as $data) {
                            echo '<option value="'.$data['id'].'">' .$GHS->getSubLinkTitle($data['sid']). ' - ' .$GHS->getNameOfMainLink($data['mid']). '</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="submit" value="Delete Content" />
                </form>
                
                <h3>Delete Notice</h3>
                <form action="inc/delete.php?ref=notice" method="post" onsubmit="return confirm('Do you really want to delete?');">
                <select name="d_select_notice" id="d_select_notice">
                    <option value="0">Select Notice</option>
                    <?php
                        $sql = $GHS->query("SELECT * FROM `notices`");
                        $links = $GHS->fetch($sql);
                        foreach ($links as $data) {
                            echo '<option value="'.$data['id'].'">' .$data['title']. '</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="submit" value="Delete Notice" />
                </form>
                
                <h3>Delete Update</h3>
                <form action="inc/delete.php?ref=update" method="post" onsubmit="return confirm('Do you really want to delete?');">
                <select name="d_select_update" id="d_select_update">
                    <option value="0">Select Update</option>
                    <?php
                        $sql = $GHS->query("SELECT * FROM `updates`");
                        $links = $GHS->fetch($sql);
                        foreach ($links as $data) {
                            echo '<option value="'.$data['id'].'">' .$data['title']. '</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="submit" value="Delete Update" />
                </form>
                
                <h3>Delete Newsletter</h3>
                <form action="inc/delete.php?ref=newsletter" method="post" onsubmit="return confirm('Do you really want to delete?');">
                <select name="d_select_newsletter" id="d_select_newsletter">
                    <option value="0">Select Newsletter</option>
                    <?php
                        $sql = $GHS->query("SELECT * FROM `newsletters`");
                        $links = $GHS->fetch($sql);
                        foreach ($links as $data) {
                            echo '<option value="'.$data['id'].'">' .$data['title']. '</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="submit" value="Delete Newsletter" />
                </form>
                
                <h3>Delete Department (Query List)</h3>
                <form action="inc/delete.php?ref=dept" method="post" onsubmit="return confirm('Do you really want to delete?');">
                <select name="d_select_dept" id="d_select_dept">
                    <option value="0">Select Department</option>
                    <?php
                        $sql = $GHS->query("SELECT * FROM `query_departments`");
                        $links = $GHS->fetch($sql);
                        foreach ($links as $data) {
                            echo '<option value="'.$data['id'].'">' .$data['name']. '</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="submit" value="Delete Department" />
                </form>
                <?php 
                    }
                ?>
            </div>
            <div id="status">
                
            </div>
            <div id="images">
                <h3>Images:</h3>
                <?php 
                    $sql = $GHS->query("SELECT * FROM images ORDER BY id DESC");
                    $data = $GHS->fetch($sql);
                    
                    $sql2 = $GHS->query("SELECT slideshow_ids FROM content");
                    $data2 = $GHS->fetch($sql2);
                    $used_img_ids = array();
                    if ($GHS->num_rows($sql2) != 0) {
                        foreach ($data2 as $info2) {
                            $inf = explode(", ", $info2['slideshow_ids']);
                            $used_img_ids = array_merge($used_img_ids, $inf);
                        }
                    }
                    if ($GHS->num_rows($sql) != 0) {
                        echo '<table id="img_table">';
                        echo '<tr><td>ID</td><td>Link</td><td>Title</td><td>Using (in slideshows)</td>';
                        if ((int)mysql_real_escape_string($_GET['mode']) == 3) {
                            echo '<td>Delete</td>';
                        }
                        echo '</tr>';
                        foreach ($data as $info) {
                            echo '<tr>';
                            echo '<td><span style="color: #f60;">'.$info['id'].'</span></td>';
                            echo '<td><a href="'.$info['link'].'">'.$info['link'].'</a></td>';
                            echo '<td>'.stripslashes($info['title']).'</td>';
                            echo '<td>';
                            if (!in_array($info['id'], $used_img_ids)) {
                                echo '<span style="color: #f00;">NO</span>';
                            }
                            echo '</td>';
                            if ((int)mysql_real_escape_string($_GET['mode']) == 3) {
                                echo '<td><a href="inc/delete.php?ref=img&id='.$info['id'].'">Delete</a></td>';
                            }
                            echo '</tr>';
                        }
                        echo '</table>';
                    }
                ?>
            </div>
        </div>
        <script type="text/javascript" src="<?=BASE_URL?>/js/functions.js"></script>
        <script type="text/javascript">
            function change_mode(){
                var val = $('#sel_mode option:selected').val();
                location.href = '<?=BASE_URL?>/admin.php?mode=' + val;
            }
        </script>
    </body>
</html>