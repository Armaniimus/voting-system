<?php

/*
  author Nickolay Asenov
  http://url2seo.com/
  ICQ: 172789242
  version 1.0
*/
(intval(substr(phpversion(),0,1))==5)?require_once('vote.php'):require_once('vote_php4.php');
$a = new voter();
echo $a->InsertVote($_POST['product'],$_POST['vot']);
?>