<?php

/*
 author Nickolay Asenov
 http://url2seo.com/ 2009
 ICQ: 172789242
 version 1.0
*/
require_once('defined.php');
 
class voter{
	private $db;
	public function __construct($dbhost=DBHOST,$dbuser=DBUSER,$dbpass=DBPASS,$level=0,$dbname=DBNAME){
		error_reporting($level);
		$this->db=new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die(ERROR);
		$this->db->query('SET NAMES utf8');
		$this->db->autocommit(false);
	}
	
	public function GetProducts(&$arr){
		$this->db->query('START TRANSACTION');
		$rez = $this->db->query('SELECT * FROM articles ORDER BY product ASC');
		$this->db->rollback();
		while ($row = $rez->fetch_array()) $arr[$row[0]] = $row[1];
		return;
	}
	
	public function GetCount(){
		$this->db->query('START TRANSACTION');
		$rez = $this->db->query('SELECT COUNT(*) AS BLA FROM articles');
		$this->db->rollback();
		$row = $rez->fetch_array();
		return $row[0];
	}
	
	public function InsertVote($product_id=0,$vote_id=0){
		if (headers_sent()) return 'The system is unavailable due to technical reasons';
		if ($_COOKIE['Votid'.intval($product_id)]) return 'You have already voted in past 24h.';
		ob_start();
		$this->db->query('START TRANSACTION');
		$this->db->query('INSERT IGNORE INTO vots (id,val) VALUES('.intval($product_id).','.intval($vote_id).')');
		if ($this->db->affected_rows>0){
			$this->db->commit();
			(!defined('COOKIES_HOST'))?setcookie('Votid'.intval($product_id),'Voted',time()+86400,VOTING_SYSTEM_FOLDER):setcookie('Votid'.intval($product_id),'Voted',time()+86400,VOTING_SYSTEM_FOLDER,COOKIES_HOST);
			ob_end_clean();
			return 'Your vote has been submitted. Thank you';
		}
		$this->db->rollback();
		ob_end_clean();
		return 'There is no such product';
	}
	
	public function Stats($id=0){
		$this->db->query('START TRANSACTION');
		$rez = $this->db->query("SELECT product,IF(SUM(val) IS NULL,0,SUM(val)) AS R1,COUNT(*) AS R2,(CASE ROUND(IF(AVG(val) IS NULL,0,AVG(val))) WHEN 0 THEN ' Score almost worst ' WHEN 1 THEN ' Score almost worst ' WHEN 2 THEN ' Score almost bad ' WHEN 3 THEN ' Score almost even ' WHEN 4 THEN ' Score almost good ' WHEN 5 THEN ' Score very good ' ELSE ' Score excellent ' END) AS R3 FROM articles NATURAL LEFT JOIN vots WHERE articles.id=".intval($id)." GROUP BY 1 ORDER BY 1 ASC") or die(ERROR);
		$this->db->rollback();
		if ($rez->num_rows<1){
			echo 'Product not found';
			return;
		}
		$red = $rez->fetch_array();
		echo 'Product '.highlight_string($red[0],true).' has '.highlight_string($red[1],true).' points of '.highlight_string($red[2],true).' votes total '.highlight_string($red[3],true);
		return;
	}
}
?>
