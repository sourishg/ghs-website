<?php
    include ('constants.php');
    include('GHS.php');
    if (!isset($_SESSION['username'])) header("location:admin_login.php");
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (mysql_real_escape_string($_GET['ref']) == "not") {
        $allowedExts = array("doc", "pdf");
        $extension = end(explode(".", $_FILES["notice_file"]["name"]));
        if ($_FILES["notice_file"]["size"] < 2000000 && in_array($extension, $allowedExts)) {
            if ($_FILES["notice_file"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["notice_file"]["error"] . "<br>";
            }
            else
            {
                echo "Upload: " . $_FILES["notice_file"]["name"] . "<br>";
                echo "Type: " . $_FILES["notice_file"]["type"] . "<br>";
                echo "Size: " . ($_FILES["notice_file"]["size"] / 1024) . " kB<br>";
                echo "Temp file: " . $_FILES["notice_file"]["tmp_name"] . "<br>";

                if (file_exists("../notices/" . $_FILES["notice_file"]["name"]))
                {
                    echo $_FILES["notice_file"]["name"] . " already exists. ";
                }
                else
                {
                    $title = addslashes($_POST['notice_title']);
                    if (!trim($title)) {
                        echo 'Please insert a title. <a href="../admin.php">Go back</a>';
                    } else {
                        $link = "notices/" . $_FILES["notice_file"]["name"];
                        $GHS->query("INSERT INTO notices VALUES('', '".addslashes($title)."', '$link')");

                        move_uploaded_file($_FILES["notice_file"]["tmp_name"],
                        "../notices/" . $_FILES["notice_file"]["name"]);
                        echo "Stored in: " . "../notices/" . $_FILES["notice_file"]["name"];

                        echo '<br /><a href="../admin.php">Go back</a>';
                    }
                }
            }
        } else {
            echo "Invalid file<br />";
            echo '<a href="../admin.php">Go back</a>';
        }
    } else if (mysql_real_escape_string($_GET['ref']) == "upd") {
        $allowedExts = array("doc", "pdf", "html", "htm", "jpeg", "jpg");
        $extension = end(explode(".", $_FILES["notice_file"]["name"]));
        if ($_FILES["notice_file"]["size"] < 5000000 && in_array($extension, $allowedExts)) {
            if ($_FILES["notice_file"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["notice_file"]["error"] . "<br>";
            }
            else
            {
                echo "Upload: " . $_FILES["notice_file"]["name"] . "<br>";
                echo "Type: " . $_FILES["notice_file"]["type"] . "<br>";
                echo "Size: " . ($_FILES["notice_file"]["size"] / 1024) . " kB<br>";
                echo "Temp file: " . $_FILES["notice_file"]["tmp_name"] . "<br>";

                if (file_exists("../updates/" . $_FILES["notice_file"]["name"]))
                {
                    echo $_FILES["notice_file"]["name"] . " already exists. ";
                }
                else
                {
                    $title = addslashes($_POST['notice_title']);
                    if (!trim($title)) {
                        echo 'Please insert a title. <a href="../admin.php">Go back</a>';
                    } else {
                        $link = "updates/" . $_FILES["notice_file"]["name"];
                        $GHS->query("INSERT INTO updates VALUES('', '".addslashes($title)."', '$link')");

                        move_uploaded_file($_FILES["notice_file"]["tmp_name"],
                        "../updates/" . $_FILES["notice_file"]["name"]);
                        echo "Stored in: " . "../updates/" . $_FILES["notice_file"]["name"];

                        echo '<br /><a href="../admin.php">Go back</a>';
                    }
                }
            }
        } else {
            echo "Invalid file<br />";
            echo '<a href="../admin.php">Go back</a>';
        }
    } else if (mysql_real_escape_string($_GET['ref']) == "newsletter") {
        $allowedExts = array("doc", "pdf");
        $extension = end(explode(".", $_FILES["notice_file"]["name"]));
        if ($_FILES["notice_file"]["size"] < 10000000 && in_array($extension, $allowedExts)) {
            if ($_FILES["notice_file"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["notice_file"]["error"] . "<br>";
            }
            else
            {
                echo "Upload: " . $_FILES["notice_file"]["name"] . "<br>";
                echo "Type: " . $_FILES["notice_file"]["type"] . "<br>";
                echo "Size: " . ($_FILES["notice_file"]["size"] / 1024) . " kB<br>";
                echo "Temp file: " . $_FILES["notice_file"]["tmp_name"] . "<br>";

                if (file_exists("../newsletters/" . $_FILES["notice_file"]["name"]))
                {
                    echo $_FILES["notice_file"]["name"] . " already exists. ";
                }
                else
                {
                    $title = addslashes($_POST['notice_title']);
                    if (!trim($title)) {
                        echo 'Please insert a title. <a href="../admin.php">Go back</a>';
                    } else {
                        $link = "newsletters/" . $_FILES["notice_file"]["name"];
                        $GHS->query("INSERT INTO newsletters VALUES('', '".addslashes($title)."', '$link')");

                        move_uploaded_file($_FILES["notice_file"]["tmp_name"],
                        "../newsletters/" . $_FILES["notice_file"]["name"]);
                        echo "Stored in: " . "../newsletters/" . $_FILES["notice_file"]["name"];

                        echo '<br /><a href="../admin.php">Go back</a>';
                    }
                }
            }
        } else {
            echo "Invalid file<br />";
            echo '<a href="../admin.php">Go back</a>';
        }
    } else if (mysql_real_escape_string($_GET['ref']) == "csv") {
        $file = $_FILES["csv_file"]["tmp_name"];
        $handle = fopen($file,"r");
        do {
            if ($data[0]) {
                $sql = $GHS->query("INSERT INTO students VALUES('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]')");
            }
        } while ($data = fgetcsv($handle,1000,",","'"));
        echo 'Student database updated.<br />';
        echo '<a href="../admin.php">Go back</a>';
    } else {
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $extension = end(explode(".", $_FILES["file"]["name"]));
        if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < 100000)
        && in_array($extension, $allowedExts))
          {
          if ($_FILES["file"]["error"] > 0)
            {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            }
          else
            {
            echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            echo "Type: " . $_FILES["file"]["type"] . "<br>";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

            if (file_exists("../images/slides/" . $_FILES["file"]["name"]))
              {
              echo $_FILES["file"]["name"] . " already exists. ";
              }
            else
              {
                $title = addslashes($_POST['title']);
                $link = "images/slides/" . $_FILES["file"]["name"];
                $GHS->query("INSERT INTO images VALUES('', '$link', '".addslashes($title)."')");

                move_uploaded_file($_FILES["file"]["tmp_name"],
                "../images/slides/" . $_FILES["file"]["name"]);
                echo "Stored in: " . "../images/slides/" . $_FILES["file"]["name"];

                echo '<br /><a href="../admin.php">Go back</a>';
                
              }
            }
          }
        else
          {
            echo "Invalid file<br />";
            echo '<a href="../admin.php">Go back</a>';
          }
    }
?>