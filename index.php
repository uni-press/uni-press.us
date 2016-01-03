<?php 

if (isset($_COOKIE["uni-press"])){
  $new_visitor=false;
} else {
  $new_visitor=true;
  setcookie("uni-press", "hi", time() * 150);
}
?>

<html>
<head>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/swfobject.js"></script>
  <script src="js/font-detect.js"></script>
  <script src="js/underscore-min.js"></script>
  <script>
    var fonts = [];

    $(document).ready(function() {
        if(typeof localStorage.unifonts === "undefined"){
            if (!swfobject.hasFlashPlayerVersion("9.0.0"))
                return;

            var fontDetect = new FontDetect("font-detect-swf", "flash/FontList.swf", function(fd) {
                fonts = _.pluck(fd.fonts(),'fontName');
                // store so that we dont always have to load em ;)
                localStorage.unifonts = fonts;
            });
        }else{
            fonts = localStorage.unifonts.split(',');
        }

        var hi = $('#hi');
        var i = 0;

        setInterval(function (){
            hi.css('font-family',fonts[i++]);
            if(i > fonts.length) i = 0;
        },100);

    });
</script>
</head>
<body>
<div id="font-detect-swf"></div>
<div style='position:absolute;left:10px;top:10px;'>
uni-press.us
</div>
<div style=position:absolute;right:10px;top:10px;'>
studio for research and production
</div>
<div style='position:absolute;left:10px;bottom:10px;'>
  jasmine.e.lee [ on ] gmail.com
</div>
<div style='position:absolute;right:10px;bottom:10px;'>
  m4rk.beasley [ around ] gmail.com
</div>

<div id='msg-bin'>
    <div id='hi'>hi!</div>
    
    <div id='visitor-welcome'>
      <?php 
        if ($new_visitor){
          echo "welcome";
        } else {
          echo "welcome back";
        }
    ?></div>
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1247021-7', 'uni-press.us');
  ga('send', 'pageview');

</script>
</body>
</html>
