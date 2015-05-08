<?php
    include('inc/constants.php');
    include('inc/GHS.php');
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>

<!Doctype HTML>
<html>
    <head>
        <title>Garden High School</title>
        
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link rel="stylesheet" type="text/css" href="css/view.css" />
        <link href="css/hot-sneaks/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css"/>
        <link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'>
        <script src="js/jquery.js"></script>
        <script type='text/javascript' src='js/jquery.mobile.customized.min.js'></script>
        <script type='text/javascript' src='js/jquery.easing.1.3.js'></script> 
        <script type='text/javascript' src='js/camera.min.js'></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Noto+Serif:400|Marko+One|Alef|Lato' rel='stylesheet' type='text/css' />
    </head>
    
    <body>
        <div id="load-area">
            <div id="loadShow">
                <img src="assets/mainload.gif" />
            </div>
        </div>
        <audio id="ghs_theme_song" preload="none">
            <source src="assets/ghs_theme_song.mp3" type="audio/mpeg">
            <source src="assets/ghs_theme_song.ogg" type="audio/ogg">
        </audio>
        <div id="top_slide">
            <div id="contact_A">
                <iframe width="500" height="390" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=+&amp;q=garden+high+school&amp;ie=UTF8&amp;hq=garden+high+school&amp;hnear=Kolkata,+West+Bengal&amp;t=m&amp;z=12&amp;iwloc=A&amp;output=embed"></iframe>
                <h1>Contact Us</h1>
                <p>318 PRANTIK PALLY, RAJDANGA,</p>
                <p>KOLKATA 700 107</p>
                <p><b> CALL US:</b> </p>
                <p>033 - 2441 3804 / 3805 / 4131</p>
                <p><b>FAX US:</b> 2441 3282 </p>
                <p><b>EMAIL:</b> </p>
                <a href ="mailto:info@gardenhighschool.org">info@gardenhighschool.org</a> <br />
                <a href="mailto:principal@gardenhighschool.org">principal@gardenhighschool.org</a><br />
                <a href="mailto:admin@gardenhighschool.org">admin@gardenhighschool.org</a>
                <a href="#" id="close" class="small-link" onclick="return false;">Close</a>
            </div>
        </div>
        
        <div id="sidebar">
            <div id="s_content">
                <ul id="subnav">
                    <li><a href="#" class="s_theschool" id="1">The School</a></li>
                    <li><a href="#" class="s_infrastructure" id="3">Infrastructure</a></li>
                    <li><a href="#" class="s_curriculum" id="4">Curriculum</a></li>
                    <li><a href="#" class="s_admission" id="5">Admission</a></li>
                    <li><a href="downloads.php" class="s_downloads">Downloads</a></li>
                    <li><a href="#" class="s_events" id="6">Events</a></li>
                    <li><a href="http://www.gardenhighschool.org/ghs/photogallery.html" class="s_photos">Photos</a></li>
                </ul>
            </div>
        </div>
        
        <div id="subnav_links">
            
        </div>
        <div id="noticeBoard">
        </div>
        
        <div id="shadow"></div>
        
        <div id="dashboard">
            <input type="text" name="search" id="search" placeholder="Search here..." onKeyUp="getSearch(this.value)" onFocus="incWidth()" onBlur="decWidth()" />
            <input type="button" class="dash_btn" id="home_page_link" value="HOME" />
            <input type="button" class="dash_btn" id="notices_link" value="NOTICES" />
        </div>
        <div id="searchResults">
        </div>
        
        <div id="show_area">
        </div>
        
        
        <div id="head_wrapper">
            <div id="logoContainer">
                <a href="#" id="music" onclick="return false;">Play School Song</a>
                <h1>Garden High School</h1>
                <div class="edge-link" id="el-sxl">
                    School Excel
                </div>
            </div>
        </div>
        
        <div id="mainContainer">
            
            
            <ul id="nav">
                <li class="about"><img src="assets/theschool.jpg" id="about" /><img src="assets/theschoolHOVER.jpg" id="about2" /></li>
                <li class="infrastructure"><img src="assets/infrastructure.jpg" id="infrastructure" /><img src="assets/infraHOVER.jpg" id="infrastructure2" /></li>
                <li class="curriculum"><img src="assets/curriculum.jpg" id="curriculum" /><img src="assets/curriculumHOVER.jpg" id="curriculum2" /></li>
                
                <li id="about_links">
                    <ul>
                    <?php 
                        $sql = $GHS->query("SELECT * FROM sub_links WHERE mid = 1");
                        $info = $GHS->fetch($sql);
                        foreach ($info as $inf) {
                            echo '<li><a href="#'.$inf['permalink'].'" onclick="loadContent('.$inf['mid'].', '.$inf['id'].');">'.$inf['name'].'</a></li>';
                        }
                    ?>
                    </ul>
                </li>
                <li id="infrastructure_links">
                    <ul>
                    <?php 
                        $sql = $GHS->query("SELECT * FROM sub_links WHERE mid = 3");
                        $info = $GHS->fetch($sql);
                        foreach ($info as $inf) {
                            echo '<li><a href="#'.$inf['permalink'].'" onclick="loadContent('.$inf['mid'].', '.$inf['id'].');">'.$inf['name'].'</a></li>';
                        }
                    ?>
                    </ul>
                </li>
                <li id="curriculum_links">
                    <ul>
                    <?php 
                        $sql = $GHS->query("SELECT * FROM sub_links WHERE mid = 4");
                        $info = $GHS->fetch($sql);
                        foreach ($info as $inf) {
                            echo '<li><a href="#'.$inf['permalink'].'" onclick="loadContent('.$inf['mid'].', '.$inf['id'].');">'.$inf['name'].'</a></li>';
                        }
                    ?>
                    </ul>
                </li>
                
                <li class="admission"><img src="assets/admission.jpg" id="admission" /><img src="assets/admissionHOVER.jpg" id="admission2" /></li>
                <li class="downloads"><a href="downloads.php" style="cursor: default;"><img src="assets/downloads.jpg" id="downloads" /><img src="assets/downloadsHOVER.jpg" id="downloads2" /></a></li>
                <li class="events"><img src="assets/events.jpg" id="events" /><img src="assets/eventsHOVER.jpg" id="events2" /></li>
                <li class="photos"><a href="http://www.gardenhighschool.org/ghs/photogallery.html" style="cursor: default;"><img src="assets/photos.jpg" id="photos" /><img src="assets/photosHOVER.jpg" id="photos2" /></a></li>
                
                <li id="admission_links">
                    <ul>
                    <?php 
                        $sql = $GHS->query("SELECT * FROM sub_links WHERE mid = 5");
                        $info = $GHS->fetch($sql);
                        foreach ($info as $inf) {
                            echo '<li><a href="#'.$inf['permalink'].'" onclick="loadContent('.$inf['mid'].', '.$inf['id'].');">'.$inf['name'].'</a></li>';
                        }
                    ?>
                    </ul>
                </li>
                <li id="events_links">
                    <ul>
                    <?php 
                        $sql = $GHS->query("SELECT * FROM sub_links WHERE mid = 6");
                        $info = $GHS->fetch($sql);
                        foreach ($info as $inf) {
                            echo '<li><a href="#'.$inf['permalink'].'" onclick="loadContent('.$inf['mid'].', '.$inf['id'].');">'.$inf['name'].'</a></li>';
                        }
                    ?>
                    </ul>
                </li>
                <li id="accordholder">
                    <div id="accordion">
                        <h3 onclick="otherh3clicks();" style="margin-top: 0;">Notices</h3>
                        <div>
                            <?php
                                $sql_n = $GHS->query("SELECT * FROM notices ORDER BY id DESC");
                                if ($GHS->num_rows($sql_n) == 0) {
                                    echo 'No current notices.';
                                } else {
                                    echo '<ul>';
                                    $nots = $GHS->fetch($sql_n);
                                    foreach ($nots as $not) {
                                        echo '<li><a href="'.$not['link'].'">'.stripslashes($not['title']).'</a></li>';
                                    }
                                    echo '</ul>';
                                }
                            ?>
                        </div>
                        <h3 onclick="otherh3clicks();">News &amp; Updates</h3>
                        <div>
                            <?php
                                $sql_n = $GHS->query("SELECT * FROM updates ORDER BY id DESC");
                                if ($GHS->num_rows($sql_n) == 0) {
                                    echo 'No current updates.';
                                } else {
                                    echo '<ul>';
                                    $nots = $GHS->fetch($sql_n);
                                    foreach ($nots as $not) {
                                        echo '<li><a href="'.$not['link'].'">'.stripslashes($not['title']).'</a></li>';
                                    }
                                    echo '</ul>';
                                }
                            ?>
                        </div>
                        <h3 onclick="resetForm();">Query (Current students)</h3>
                        <div id="contact_area">
                            
                            <div id="topic_area">
                                Guardians of current students can request change/update in student records via this contact form.<br /><br />
                                <h2 style="padding-top: 0;">Select Topic > <span class="grayed">Enter student details</span> > <span class="grayed">Compose a message</span></h2>
                                <select name="c_topic" id="dept_topics" onchange="startContactSystem(this.value)">
                                    <option value="0">Select a topic...</option>
                                    <?php
                                        $sql = $GHS->query("SELECT * FROM query_departments");
                                        $depts = $GHS->fetch($sql);
                                        foreach ($depts as $dept)
                                        {
                                            echo '<option value="'.$dept['name'].'">'.stripslashes($dept['name']).'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div id="details_area">
                                Please mention any one of the registered email addresses.
                                <h2><span class="grayed">Select Topic</span> > Enter student details > <span class="grayed">Compose a message</span></h2>
                                <table>
                                    <tr>
                                        <td align="right">ID Number:</td>
                                        <td><input type="text" id="c_id_no" placeholder="e.g. 20011023"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">Email:</td>
                                        <td><input type="email" id="c_email" placeholder="Enter registered email..."></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="button" value="Verify" class="dash_btn" style="border: 1px solid #333; width: 100px;" onclick="requestToken();"></td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div id="main_message_area">
                                <h2><span class="grayed">Select Topic</span> > <span class="grayed">Enter student details</span> > Compose a message</h2>
                                <table id="anony">
                                    <tr>
                                        <td align="right" style="padding-left: 0;">Name:</td>
                                        <td><input type="text" id="c_name_anony"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" style="padding-left: 0;">Email:</td>
                                        <td><input type="email" id="c_email_anony"></td>
                                    </tr>
                                </table><br>
                                <textarea placeholder="Write here..." id="c_message"></textarea><br />
                                <p id="verify">Verification Code: <input type="text" placeholder="Enter code here..." id="v_code"></p>
                                <input type="button" value="Send" class="dash_btn" onclick="processFinalData();">
                            </div>
                            <div id="c_status" style="background: #e8e7d0;"></div>
                        </div>
                    </div>
                </li>
                <li id="live-tile">
                    <h3>Important Updates</h3>
                    <ul id="live-tile-feed">
                        <li><a href="">Some cause happiness wherever they go; others whenever they go.</a></li>
                        <li><a href="">The problem is not the problem. The problem is your attitude towards the problem.</a></li>
                        <li><a href="">There are only two tragedies in life: one is not getting what one wants, and the other is getting it.</a></li>
                    </ul>
                </li>
            </ul>
                
            
            <div id="footer">
                <p>&COPY; Garden High School &bull; All Rights Reserved &bull; <a href="#" id="contact-us">Contact Us</a><br /><br />
                    <span style="color: #999;">Best viewed in Google Chrome, Firefox, and Safari</span>
                </p>
            </div>
        </div>
        <script src="js/flip.js"></script>
        <script src="js/functions.js"></script>
        <script src="js/utilities.js"></script>
    </body>
</html>