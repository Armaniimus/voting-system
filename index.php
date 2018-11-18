<?php

/*
  author Nickolay Asenov
  http://url2seo.com/
  ICQ: 172789242
  version 1.0
*/
header("Content-Type: text/html; charset=utf-8");
require_once('/php/vote.php');
error_reporting(0);
?>
<script type="text/javascript" language="javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" language="javascript" src="js/my_js.php"></script>

<div id="sreda">
    <label>
        <select name="voteSystem__Select">
            <option value="0">&mdash;&mdash;&mdash;</option>
            <?php
            $tmp = new voter();
            $a = array();
            $tmp->GetProducts($a);

            foreach ($a as $k=>$v){?>
            <option value="<?php echo $k;?>"><?php echo $v;?></option>
            <?php }?>
        </select>
        &nbsp;Select product
    </label><br />
    <label><input type="radio" name="radio1" value="6" checked="checked" id="radio1_0" />excellent</label><br />
    <label><input type="radio" name="radio1" value="5" id="radio1_1" />very good</label><br />
    <label><input type="radio" name="radio1" value="4" id="radio1_2" />good</label><br />
    <label><input type="radio" name="radio1" value="3" id="radio1_3" />even</label><br />
    <label><input type="radio" name="radio1" value="2" id="radio1_4" />bad</label><br />
    <label><input type="radio" name="radio1" value="1" id="radio1_5" />worst</label><br />
    <input type="button" name="voteSystem__Submit" value="Submit" /><br />
</div>
