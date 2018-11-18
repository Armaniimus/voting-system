<?php

/*
  author Nickolay Asenov
  http://url2seo.com/
  ICQ: 172789242
  version 1.0
*/
require_once('vote.php');
$a = new voter();
echo $a->InsertVote($_POST['product'],$_POST['vot']);
?>
