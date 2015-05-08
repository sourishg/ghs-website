<?php
    include ('inc/constants.php');
    include('inc/GHS.php');
    $GHS = new GHS(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if (!isset($_GET['mid']) || !isset($_GET['sid'])) {
        echo 'Error.';
    } else {
        $mid = (int)mysql_real_escape_string($_GET['mid']);
        $sid = (int)mysql_real_escape_string($_GET['sid']);
        $id = $GHS->getContentId($mid, $sid);
?>    
    
    <div id="wrapper">
        <h1 id="title"><?php echo $GHS->getSubLinkTitle($sid); ?></h1>
        <?php 
            $sql = $GHS->query("SELECT * FROM content WHERE id = '$id'");
            $content = $GHS->fetch($sql);
            $img_ids = explode(", ", $content[0]['slideshow_ids']);

            if ($img_ids[0] != "") {
        ?>
        <script>
            jQuery(function(){
                jQuery('#camera_wrap_1').camera({
                        thumbnails: false
                });

                jQuery('#camera_wrap_2').camera({
                        height: '630px',
                        loader: 'bar',
                        pagination: false,
                        thumbnails: false
                });
            });

        </script>
        <div id="flow">
            <div id="slideshow">
                <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
                <?php
                    

                        for ($i = 0; $i < sizeof($img_ids); $i++) {
                            $link = $GHS->getImgLink($img_ids[$i]);
                            $caption = $GHS->getImgTitle($img_ids[$i]);
                            echo '<div data-src="'.$link.'">';
                            if ($caption != "0") {
                                echo '<div class="camera_caption fadeFromBottom">'.$caption.'</div>';
                            }
                            echo '</div>';
                        }
                        
                    
                ?>
                </div>
            </div>
        </div>
        <?php 
            }
        ?>
        <div id="content">
            <?php
               $sql = $GHS->query("SELECT * FROM content WHERE id = '$id'");
               $content = $GHS->fetch($sql);
               echo stripslashes($content[0]['content']);
            ?>
        </div>
    </div>
    
<?php 
    }
?>