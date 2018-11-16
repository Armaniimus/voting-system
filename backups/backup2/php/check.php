<?php

/*
  author Nickolay Asenov
  http://url2seo.com/
  ICQ: 172789242
  version 1.0
*/
(intval(substr(phpversion(),0,1))==5)?require_once('vote.php'):require_once('vote_php4.php');
$a = new voter();
$a->Stats($_GET['prodid']);
echo '<br /><a href="./index.php" target="_top" title="Vote for other product">Vote for other product</a><br /><br />';
?>