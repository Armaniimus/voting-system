<?php

/*
  author Nickolay Asenov
  http://url2seo.com/
  ICQ: 172789242
  version 1.0
*/
require_once('defined.php');
 
class voter{
	var $db;
	
	function voter($dbhost=DBHOST,$dbuser=DBUSER,$dbpass=DBPASS,$level=0,$dbname=DBNAME){
		error_reporting($level);
		$this->db = mysql_connect($dbhost,$dbuser,$dbpass) or die(ERROR);
		mysql_select_db($dbname,$this->db) or die(ERROR);
		mysql_query('SET NAMES utf8',$this->db);
		mysql_query('SET @@AUTOCOMMIT=0',$this->db);
	}
	
	function GetProducts(&$arr){
		mysql_query('START TRANSACTION',$this->db);
		$rez = mysql_query('SELECT * FROM articles ORDER BY product ASC',$this->db);
		mysql_query('ROLLBACK',$this->db);
		while ($row = mysql_fetch_array($rez)) $arr[$row[0]] = $row[1];
		return;
	}
	
	function GetCount(){
		mysql_query('START TRANSACTION',$this->db);
		$rez = mysql_query('SELECT COUNT(*) AS BLA FROM articles',$this->db);
		mysql_query('ROLLBACK',$this->db);
		return mysql_result($rez,0);
	}
	
	function InsertVote($product_id=0,$vote_id=0){
		if (headers_sent()) return 'The system is unavailable due to technical reasons';
		if ($_COOKIE['Votid'.intval($product_id)]) return 'You have already voted in past 24h.';
		ob_start();
		mysql_query('START TRANSACTION',$this->db);
		mysql_query('INSERT IGNORE INTO vots (id,val) VALUES('.intval($product_id).','.intval($vote_id).')',$this->db);
		if (mysql_affected_rows($this->db)>0){
			mysql_query('COMMIT',$this->db);
			(!defined('COOKIES_HOST'))?setcookie('Votid'.intval($product_id),'Voted',time()+86400,VOTING_SYSTEM_FOLDER):setcookie('Votid'.intval($product_id),'Voted',time()+86400,VOTING_SYSTEM_FOLDER,COOKIES_HOST);
			ob_end_clean();
			return 'Your vote has been submitted. Thank you';
		}
		mysql_query('ROLLBACK',$this->db);
		ob_end_clean();
		return 'There is no such product';
	}
	
	function Stats($id=0){
		mysql_query('START TRANSACTION',$this->db);
		$rez = mysql_query("SELECT product,IF(SUM(val) IS NULL,0,SUM(val)) AS R1,COUNT(*) AS R2,(CASE ROUND(IF(AVG(val) IS NULL,0,AVG(val))) WHEN 0 THEN ' Score almost worst ' WHEN 1 THEN ' Score almost worst ' WHEN 2 THEN ' Score almost bad ' WHEN 3 THEN ' Score almost even ' WHEN 4 THEN ' Score almost good ' WHEN 5 THEN ' Score very good ' ELSE ' Score excellent ' END) AS R3 FROM articles NATURAL LEFT JOIN vots WHERE articles.id=".intval($id)." GROUP BY 1 ORDER BY 1 ASC",$this->db) or die(ERROR);
		mysql_query('ROLLBACK',$this->db);
		if (mysql_num_rows($rez)<1){
			echo 'Product not found';
			return;
		}
		$red = mysql_fetch_array($rez);
		echo 'Product '.highlight_string($red[0],true).' has '.highlight_string($red[1],true).' points of '.highlight_string($red[2],true).' votes total '.highlight_string($red[3],true);
		return;
	}
}
?>
