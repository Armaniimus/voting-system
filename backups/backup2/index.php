<?php

/*
  author Nickolay Asenov
  http://url2seo.com/
  ICQ: 172789242
  version 1.0
*/
require_once('php/headers.php');
?>
<body>
<div id="maina">
<div id="balancer">
<div id="headers"><h1><a href="http://www.url2seo.com/" title="URL shortener and redirection services" target="_top">URL2SEO</a> : URL shortener and redirection services</h1>
<h2>PHP AJAX Voting system</h2>
<a id="dldcnt" href="http://url2seo.com/vote/download/phpajax_voting_src.zip" title="Download">Download source code</a>
</div>
<div id="levo">
<p>
<script type="text/javascript"><!--
google_ad_client = "pub-1503375014465264";
/* 200x90, created 09-5-11 */
google_ad_slot = "8991143048";
google_ad_width = 200;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
</p>
<br />
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick" />
<input type="hidden" name="hosted_button_id" value="5113348" />
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!" />
<img alt="Donate via PayPal" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
</form><br /><br />
</div>
<div id="sreda">
<label>
<select name="select1">
<option value="0">&mdash;&mdash;&mdash;</option>
<?php
$tmp = new voter();
$a = array();
$tmp->GetProducts($a);
foreach ($a as $k=>$v){?>
<option value="<?php echo $k;?>"><?php echo $v;?></option>
<?php }?>
</select>&nbsp;Select product</label><br />
      <label>
        <input type="radio" name="radio1" value="6" checked="checked" id="radio1_0" />
        excellent</label>
      <br />
      <label>
        <input type="radio" name="radio1" value="5" id="radio1_1" />
        very good</label>
      <br />
      <label>
        <input type="radio" name="radio1" value="4" id="radio1_2" />
        good</label>
      <br />
      <label>
        <input type="radio" name="radio1" value="3" id="radio1_3" />
        even</label>
      <br />
      <label>
        <input type="radio" name="radio1" value="2" id="radio1_4" />
        bad</label>
      <br />
      <label>
        <input type="radio" name="radio1" value="1" id="radio1_5" />
        worst</label>
      <br />
      <input type="button" name="s1" value="Submit" /><br />
</div>
<div id="desno">
<script type="text/javascript"><!--
google_ad_client = "pub-1503375014465264";
/* 120x240, created 09-5-11 */
google_ad_slot = "1642235290";
google_ad_width = 120;
google_ad_height = 240;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
</div>
</div>
<?php require_once('php/footer.php');?>
</div>
</body>
</html>
