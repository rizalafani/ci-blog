<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {
	/*
	Contoh Aplikasi Web/Weblog/Website Sederhana Codeigniters
	Oleh Ahmad Rizal Afani
	http://calonpresident.blogspot.coms
	file : blog_model.php untuk load data dari database
	*/
	function GetLabel($where = ''){
		return $this->db->query("select * from label $where;");
	}
	
	function GetLabelContent($where = ''){
		return $this->db->query("select * from content_label $where;");
	}
	
	function GetUser($where = ''){
		return $this->db->query("select * from userapp $where;");
	}
	
	function GetContent($where = ''){
		return $this->db->query("select * from content $where;");
	}
	
	function GetContentJoinLabel($where = ''){
		return $this->db->query("select * from content inner join content_label on content.kode_content=content_label.kode_content $where;");
	}
	
	function GetContentView(){
		return $this->db->query("select sum(counter) as totalview from content where status = 'publish'");
	}
	
	function GetSetting(){
		return $this->db->query("select * from setting;");
	}
	
	function GetComment($where = ""){
		return $this->db->query("select content.judul_content,komentar.*  from content inner join komentar on komentar.kode_content=content.kode_content $where;");
	}
	
	/* Queries for blog */
	function GetContentBlog($where = ""){
		return $this->db->query("select content.*,count(komentar.kode_comment)as totalkomentar from content left join (select * from komentar where status = 'publish' group by kode_content)as komentar on content.kode_content=komentar.kode_content inner join content_label on content.kode_content=content_label.kode_content $where;");
	}
	
	function GetContentPublished($where = ""){
		return $this->db->query("select count(*)as total from (select content.*,count(komentar.kode_comment)as totalkomentar from content left join komentar on content.kode_content=komentar.kode_content inner join content_label on content.kode_content=content_label.kode_content $where group by content.kode_content order by content.kode_content desc) as temp");
	}
	
	function GetContentDetail($where = ""){
		return $this->db->query("select content.*,count(komentar.kode_comment)as totalkomentar from content inner join komentar on content.kode_content=komentar.kode_content $where;");
	}
	
	function GetVisitor($where = ""){
		return $this->db->query("select * from visitor $where");		
	}
	
	public function InsertData($table,$data){
		return $this->db->insert($table,$data);
	}
	
	public function UpdateData($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}
	
	public function DeleteData($table,$where){
		return $this->db->delete($table,$where);
	}
}
?>