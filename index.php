<!Doctype HTML>
<html>
    <head>
        <title>
            Garden High School | Satikanta Guha Foundation
        </title>
        <link rel="stylesheet" href="css/reset.css" />
        <link href='http://fonts.googleapis.com/css?family=Fauna+One' rel='stylesheet' type='text/css'>
        <style>
            body {
                background: url('assets/bg1.jpg') repeat;
            }
            #wrapper {
                padding-top: 20px;
            }
            #wrapper_layer {
                opacity: 0.6;
                width: 100%;
                height: 315px;
                position: absolute;
                top: 90px;
                background: #051520;
            }
            #head {
                font-family: 'Fauna One', serif;
                font-weight: 100;
                font-size: 30pt;
                color: #fff;
                padding: 30px;
                text-align: center;
            }
            #navig {
                position: relative;
                height: 280px;
                margin-top: 20px;
                width: 950px;
                margin: 0 auto;
            }
            #skgf, #ghs, #ghsi {
                outline: none;
                border: 2px solid #000;
            }
            #skgf {
                width: 600px;
                height: 250px;
                display: inline-block;
                background: url('re/skgf-link.jpg') no-repeat;
                position: absolute;
                top: 0;
                left: 0;
            }
            #skgf:hover {
                border: 2px solid #9e3c2d;
            }
            #ghs {
                position: absolute;
                top: 0;
                right: 0;
                width: 320px;
                height: 120px;
                display: inline-block;
                background: url('re/ghs-link.jpg') no-repeat;
            }
            #ghs:hover {
                border: 2px solid #296727;
            }
            #ghsi {
                position: absolute;
                top: 130px;
                right: 0;
                width: 320px;
                height: 120px;
                display: inline-block;
                background: url('re/ghsi-link.jpg') no-repeat;
            }
            #ghsi:hover {
                border: 2px solid #2a4a98;
            }
            #c-skgf {
                background: #000;
                min-width: 360px;
                width: 35%;
                height: 100%;
                overflow: hidden;
                margin: 0;
                position: fixed;
                z-index: 100;
                color: #fff;
                right: 0;
                top: 0;
                font-family: 'Fauna One';
                font-size: 12pt;
                line-height: 1.5em;
                padding: 20px;
                display: none;
                text-align: justify;
            }
            #footer {
                font-family: Arial;
                font-size: 10pt;
                padding: 20px 0;
                text-align: center;
                color: #fff;
            }
        </style>
        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui.min.js"></script>
    </head>
    <body>
        <div id="wrapper_layer"></div>
        <div id="head">Satikanta Guha Foundation</div>
        <div id="wrapper">
            <div id="navig">
                <a href="skgf/" id="skgf" target="_blank"></a>
                <a href="home.php" id="ghs" target="_blank"></a>
                <a href="#" id="ghsi" target="_blank"></a>
            </div>
        </div>
        <div id="c-skgf">
                
                <p>
                    <img src="re/skg.jpg" height="200" style="float: left; margin-right: 10px; padding-right: 10px;" />
                    Satikanta Guha Foundation was established in September 1991 in memory of Satikanta Guha who expired in January that year.<br /><br />
Since the names of Satikanta Guha and his wife, Prity Lata Guha, the first secretary of the Foundation are indissolubly linked with South Point as its Founder and Associate Founder, the first members of the Foundation decided that education should be the main sphere of the Foundation's activities.</p>
            
        </div>
        <div id="footer">
            &copy; Satikanta Guha Foundation | All Rights Reserved
        </div>
        <script>
            $('#skgf').hover(function(){
                $('#c-skgf').show("slide", {direction: "right"}, 500);
                $('#head').animate({
                   marginLeft: '-=300'
                }, 500, function() {
                   // Animation complete.
                });
            }, function(){
                $('#c-skgf').hide("slide", {direction: "right"}, 200);
                $('#head').animate({
                   marginLeft: '+=300'
                }, 200, function() {
                   // Animation complete.
                });
            });
            (function($) {
                var cache = [];
            
                $.preLoadImages = function() {
                    var args_len = arguments.length;
                    for (var i = args_len; i--;) {
                        var cacheImage = document.createElement('img');
                        cacheImage.src = arguments[i];
                        cache.push(cacheImage);
                    }
                }
            })(jQuery)
        </script>
    </body>
</html>