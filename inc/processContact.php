<?php
    include ('constants.php');
    include('GHS.php');
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    $message = "";
    
    if ((int)$_POST['type'] == 1) {
        $topic = mysql_real_escape_string($_POST['topic']);
        $school_id = (int)mysql_real_escape_string($_POST['id_no']);
        $email = mysql_real_escape_string($_POST['email']);
        $token = mysql_real_escape_string($_POST['v_code']);
        $content = strip_tags(trim($_POST['message']));
        $sql = $GHS->query("SELECT * FROM students WHERE id_no = '$school_id'");
        if ($GHS->num_rows($sql) != 0) {
            $data = $GHS->fetch($sql);
            foreach ($data as $info) {
                $email_f = explode(", ", $info['email_f']);
                $email_m = explode(", ", $info['email_m']);
                if (in_array($email, $email_f) || in_array($email, $email_m)) {
                    if ($token == $info['token']) {
                        if (!$content) {
                            $message = "Please enter some content.";
                        } else {
                            
                            $mailing_list = array();
                            $sql3 = $GHS->query("SELECT * FROM query_departments WHERE name = '$topic'");
                            $dept_info = $GHS->fetch($sql3);
                            foreach ($dept_info as $dept) {
                                $mailing_list = explode(", ", $dept['email_list']);
                            }
                            $retval = null;
                            foreach ($mailing_list as $key => $value) {
                                $subject = "Message from Site Visitor";
                                $header = "From:" .$email. " \r\n";
                                $msg = "Subject: " . $topic . "\n" . "ID: " . $school_id . "\n" . "Email: " . $email . "\n" . $content;
                                $retval = mail ($value,$subject,$msg,$header);
                            }
                            if ($retval)
                            {
                                echo 'Your message/query has been sent successfully. Thank you for writing to us.';
                            } else
                            {
                                echo 'Error! Your message could not be sent.';
                            }
                        }
                    } else {
                        $message = "Please enter a proper validation code.";
                    }
                } else {
                    $message = "Please enter a valid email.";
                }
            }
        } else {
            $message = "Wrong id.";
        }
        echo $message;
    } else {
        $school_id = (int)mysql_real_escape_string($_POST['id_no']);
        $email = mysql_real_escape_string($_POST['email']);

        $sql = $GHS->query("SELECT * FROM students WHERE id_no = '$school_id'");
        if ($GHS->num_rows($sql) != 0) {
            $data = $GHS->fetch($sql);
            foreach ($data as $info) {
                $email_f = explode(", ", $info['email_f']);
                $email_m = explode(", ", $info['email_m']);
                if (in_array($email, $email_f) || in_array($email, $email_m)) {
                    $to = $email;
                    $subject = "Garden High School: Token";
                    $token = uniqid();
                    $message = "This is the verification code you need to validate your form. Enter it as it is given here: " . $token;
                    $header = "From:do-not-reply@gardenhighschool.org \r\n";
                    $retval = mail ($to,$subject,$message,$header);
                    if( $retval == true )  
                    {
                        $sql2 = $GHS->query("UPDATE students SET token = '$token' WHERE id = $info[id]");
                        if ($sql2) {
                            $message = 'A verification code has been sent to your email. <a href="#" onclick="startMainMessage(); return false;">Click here to proceed and write your message.</a>';
                        }
                    }
                    else
                    {
                       $message = "Verification code could not be sent...";
                    }
                } else {
                    $message = "
                        EMAIL NOT REGISTERED<br />
                        <br />
                        PLEASE UPDATE YOUR EMAIL ID'S NOW.<br />
                        <br />
                        CONTACT 033 24413804 | 3805 | 4131.
                    ";
                }
            }
        } else {
            $message = 'Please enter a correct ID number.';
        }
        echo $message;
    }
?>
