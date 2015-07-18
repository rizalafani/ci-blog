<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webadmin extends CI_Controller {
	/*
	Contoh Aplikasi Web/Weblog/Website Sederhana Codeigniter
	Oleh Ahmad Rizal Afani
	http://calonpresident.blogspot.com
	file : webadmin.php untuk aplikasi content management system blog
	*/
	public function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		$this->cek_session();
		$data = array(
			'total_post' => $this->blog_model->GetContent()->num_rows(),
			'total_comment' => $this->blog_model->GetComment()->num_rows(),
			'page_view' => $this->blog_model->GetContentView()->result_array(),
			'post' => $this->blog_model->GetContent("where status = 'publish' order by counter desc")->result_array(),
			'comment' => $this->blog_model->GetComment("where komentar.status = 'pending' order by komentar.kode_comment")->result_array(),
			'session' => $this->session->userdata('login'),
			'title' => 'Dasboard admin calonpresident.blogspot.com'
		);
		$this->load->view('webadmin/index',$data);
	}
	
	function login($mess = 1){
		$this->load->view('webadmin/login',array('message' => $mess,'title' => 'Login dasboard admin calonpresident.blogspot.com'));
	}
	
	function proseslogin(){		
		if($_POST){
			$username = addslashes($_POST['username']);
			$password = addslashes($_POST['password']);			
			$temp = $this->blog_model->GetUser("where username = '$username' and password = '$password'")->result_array();
			if($temp != NULL){
				$data = array(
					'username' => $temp[0]['username'],
					'pengguna' => $temp[0]['nama_lengkap'],
					'password' => $temp[0]['password']
				);
				$this->session->set_userdata('login',$data);
				session_start();
				$_SESSION['kcfinder_mati'] = false;				
				header('location:'.base_url().'index.php/webadmin/');
			}else{
				header('location:'.base_url().'index.php/webadmin/login/0');
			}
		}else{
			$this->load->view('webadmin/pagenotfound',array('title' => 'Dasboard admin calonpresident.blogspot.com'));
		}
	}
	
	function newcontent(){
		$this->cek_session();
		$data_sess = $this->session->userdata('login');
		$data = array(
			'session' => $this->session->userdata('login'),
			'username' => $data_sess['pengguna'],
			'kode_content' => '',
			'judul_content' => '',
			'header_post' => '',
			'deskripsi' => '',
			'status' => 'baru',
			'status_content' => '',
			'label' => $this->blog_model->GetLabel()->result_array(),
			'label_post' => array(),
			'tags' => '',
			'isi' => '',
			'title' => 'Dasboard admin calonpresident.blogspot.com - isi content'
		);
		$this->load->view('webadmin/editor',$data);
	}
	
	function editcontent($kode = 0){
		$this->cek_session();
		$data_sess = $this->session->userdata('login');
		$data_content = $this->blog_model->GetContent("where kode_content = '$kode'")->result_array();
		/*label to array*/
		$label_post_arr = array();
		foreach($this->blog_model->GetLabelContent("where kode_content = '$kode'")->result_array() as $lab){
			$label_post_arr[] = $lab['kode_label'];
		}		
		/*end label to array*/
		$data = array(
			'session' => $this->session->userdata('login'),
			'username' => $data_sess['pengguna'],
			'kode_content' => $data_content[0]['kode_content'],
			'judul_content' => $data_content[0]['judul_content'],
			'header_post' => $data_content[0]['image_header'],		
			'deskripsi' => $data_content[0]['deskripsi'],
			'status_content' => $data_content[0]['status'],
			'status' => 'lama',
			'label' => $this->blog_model->GetLabel()->result_array(),
			'label_post' => $label_post_arr,
			'tags' => $data_content[0]['tags'],
			'isi' => $data_content[0]['content'],
			'title' => 'Dasboard admin calonpresident.blogspot.com - edit content'
		);
		$this->load->view('webadmin/editor',$data);
	}
	
	function session_preview(){
		$this->cek_session();
		if($_POST){
			$data_sess = $this->session->userdata('login');
			$data = array(
				'username' => $data_sess['username'],
				'judul_content' => $_POST['judul_post'],
				'header_post' => $_POST['header_post'],
				'penulis' => $data_sess['pengguna'],
				'tanggal' => date("Y-m-d H:i:s"),
				'tags' => $_POST['tags'],
				'isi' => $_POST['isi'],
				'title' => 'Dasboard admin calonpresident.blogspot.com'
			);
			/*can't use CI session for save any values :-( */
			/*$this->session->set_userdata('pratinjau',$data);
			print_r($this->session->userdata('pratinjau'));*/
			/*session php*/
			session_start();
			$_SESSION['pratinjau'] = $data;
		}else{
			$this->load->view('webadmin/pagenotfound',array('title' => 'page not found'));
		}
	}
	
	function pratinjau(){
		$this->cek_session();
		/* preview post */
		/*can't use CI session for save any values :-( */
		/*$sess_pratinjau = $this->session->userdata('pratinjau');*/
		/*session php*/
		session_start();
		$sess_pratinjau = $_SESSION['pratinjau'];
		$data_sess = $this->session->userdata('login');
			$data = array(
				'username' => $data_sess['username'],
				'judul_content' => isset($_POST['judul_post']) ? $_POST['judul_post'] : $sess_pratinjau['judul_content'],
				'header_post' => isset($_POST['header_post']) ? $_POST['header_post'] : $sess_pratinjau['header_post'],
				'penulis' => $data_sess['pengguna'],
				'tanggal' => date("Y-m-d H:i:s"),
				'tags' => isset($_POST['tags']) ? $_POST['tags'] : $sess_pratinjau['tags'],
				'isi' => isset($_POST['isi']) ? $_POST['isi'] : $sess_pratinjau['isi'],
			);
			
		$this->session->set_userdata('pratinjau',$data);
		/* end */
		$sess_pratinjau = $this->session->userdata('pratinjau');
		$data_setting = $this->blog_model->GetSetting()->result_array();	
		$data = array(
			'recent_post' => $this->blog_model->GetContent("where status = 'publish' order by rand() limit 5")->result_array(),
			'content' => $sess_pratinjau,
			'penulis' => $sess_pratinjau["penulis"],
			'deskripsi' => $data_setting[0]['deskripsi_blog'],
			'author' => 'Ahmad Rizal Afani (calonpresident.blogspot.com)',
			'title' => $data_setting[0]['judul_blog'].' - '.$sess_pratinjau['judul_content'],
			'komentar' => '',
			'fb_fans_page' => $data_setting[0]['facebook_fans_page'],
			'twitter' => $data_setting[0]['twitter'],
			'penulis' => $this->blog_model->GetUser("where username = '".$sess_pratinjau['username']."'")->result_array(),			
		);
		$this->load->view('webadmin/preview',$data);
	}
	
	function savecontent(){
		$this->cek_session();
		if($_POST){
			$data_sess = $this->session->userdata('login');
			
			$judul_post = $_POST['judul_post'];
			$header_post = $_POST['header_post'];
			$deskripsi = $_POST['deskripsi'];
			$status = $_POST['status'];
			$labels = $_POST['labels'];
			$tags = $_POST['tags'];
			$isi = $_POST['isi'];
			$kode_content = $_POST['kode_content'];
			$status_simpan = $_POST['status_simpan'];
			
			if($status_simpan == "baru"){
				$data = array(
					'judul_content' => $judul_post,
					'image_header' => $header_post,
					'deskripsi' => $deskripsi,
					'tanggal' => date("Y-m-d H:i:s"),
					'penulis' => $data_sess['pengguna'],
					'content' => $isi,
					'tags' => $tags,
					'status' => $status,
					'image_header' => $header_post,
					'counter' => 0
				);
				$result = $this->blog_model->InsertData('content',$data);
				if($result == 1){
					$terakhir = $this->blog_model->GetContent('order by kode_content desc limit 1')->result_array();
					foreach($labels as $l){
						$data = array(
							'kode_content' => $terakhir[0]['kode_content'],
							'kode_label' => $l
						);
						$this->blog_model->InsertData('content_label',$data);
					}
					header('location:'.base_url().'index.php/webadmin/content/2');
				}else{
					header('location:'.base_url().'index.php/webadmin/content/0');
				}
			}else{
				$this->blog_model->DeleteData('content_label',array('kode_content' => $kode_content));
				$data = array(
					'judul_content' => $judul_post,
					'image_header' => $header_post,
					'deskripsi' => $deskripsi,
					'tanggal' => date("Y-m-d H:i:s"),
					'penulis' => $data_sess['pengguna'],
					'content' => $isi,
					'tags' => $tags,
					'status' => $status,
					'image_header' => $header_post
				);
				$result = $this->blog_model->UpdateData('content',$data,array('kode_content' => $kode_content));
				if($result == 1){
					foreach($labels as $l){
						$data = array(
							'kode_content' => $kode_content,
							'kode_label' => $l
						);
						$this->blog_model->InsertData('content_label',$data);
					}
					header('location:'.base_url().'index.php/webadmin/content/3');
				}else{
					header('location:'.base_url().'index.php/webadmin/content/0');
				}
			}
		}else{
			$this->load->view('webadmin/pagenotfound',array('title' => 'page not found'));
		}
	}	
	
	function deletecontent($kode = 0){
		$this->cek_session();
		$this->blog_model->DeleteData('content_label',array('kode_content' => $kode));
		$result = $this->blog_model->DeleteData('content',array('kode_content' => $kode));
		if($result == 1){
			header('location:'.base_url().'index.php/webadmin/content/1');
		}else{
			header('location:'.base_url().'index.php/webadmin/content/0');
		}
	}
	
	function content($mess = -1){
		$this->cek_session();
		$data = array(			
			'session' => $this->session->userdata('login'),
			'content' => $this->blog_model->GetContent('order by kode_content desc')->result_array(),
			'message' => $mess,
			'title' => 'Dasboard admin calonpresident.blogspot.com - semua content'
		);
		$this->load->view('webadmin/post',$data);
	}
	
	function contentpublish($mess = -1){
		$this->cek_session();
		$data = array(
			'session' => $this->session->userdata('login'),
			'content' => $this->blog_model->GetContent('where status = "publish" order by kode_content desc')->result_array(),
			'message' => $mess,
			'title' => 'Dasboard admin calonpresident.blogspot.com - semua content diterbitkan'
		);
		$this->load->view('webadmin/post',$data);
	}
	
	function contentdraft($mess = -1){
		$this->cek_session();
		$data = array(
			'session' => $this->session->userdata('login'),
			'content' => $this->blog_model->GetContent('where status = "draft" order by kode_content desc')->result_array(),
			'message' => $mess,
			'title' => 'Dasboard admin calonpresident.blogspot.com - semua content draft'
		);
		$this->load->view('webadmin/post',$data);
	}	
	
	function labels($mess = -1){
		$this->cek_session();
		$data = array(
			'session' => $this->session->userdata('login'),
			'status' => 'baru',
			'judul_label' => '',
			'kode_label' => '',
			'message' => $mess,
			'label' => $this->blog_model->GetLabel("order by kode_label desc")->result_array(),
			'title' => 'Dasboard admin calonpresident.blogspot.com - semua label'
		);
		$this->load->view('webadmin/label',$data);
	}
	
	function editlabel($kode = 0){
		$this->cek_session();
		$temp = $this->blog_model->GetLabel("where kode_label = '$kode'")->result_array();
		$data = array(
			'session' => $this->session->userdata('login'),
			'status' => 'lama',
			'judul_label' => $temp[0]['judul_label'],
			'kode_label' => $temp[0]['kode_label'],
			'message' => "",
			'label' => $this->blog_model->GetLabel("where kode_label != '$kode' order by kode_label desc")->result_array(),
			'title' => 'Dasboard admin calonpresident.blogspot.com - edit label'
		);
		$this->load->view('webadmin/label',$data);
	}
	
	function savelabel(){
		$this->cek_session();
		if($_POST){
			$status = $_POST['status'];
			$kode_label = $_POST['kode_label'];
			$judul_label = $_POST['judul_label'];			
			if($status == "baru"){
				$data = array(
					'kode_label' => $kode_label,
					'judul_label' => $judul_label
				);
				$result = $this->blog_model->InsertData('label',$data);
				if($result == 1){
					header('location:'.base_url().'index.php/webadmin/labels/2');
				}else{
					header('location:'.base_url().'index.php/webadmin/labels/0');
				}
			}else{
				$data = array(
					'judul_label' => $judul_label
				);
				$result = $this->blog_model->UpdateData('label',$data,array('kode_label' => $kode_label));
				if($result == 1){
					header('location:'.base_url().'index.php/webadmin/labels/3');
				}else{
					header('location:'.base_url().'index.php/webadmin/labels/0');
				}
			}			
		}else{
			$this->load->view('webadmin/pagenotfound',array('title' => 'page not found'));
		}
	}
	
	function deletelabel($kode = 1){
		$this->cek_session();
		$result = $this->blog_model->DeleteData('label',array('kode_label' => $kode));
		if($result == 1){
			header('location:'.base_url().'index.php/webadmin/labels/1');
		}else{
			header('location:'.base_url().'index.php/webadmin/labels/0');
		}
	}
	
	function users($mess = -1){
		$this->cek_session();
		$data = array(
			'session' => $this->session->userdata('login'),
			'message' => $mess,
			'user' => $this->blog_model->GetUser()->result_array(),
			'title' => 'Dasboard admin calonpresident.blogspot.com - semua user'
		);
		$this->load->view('webadmin/user',$data);
	}
	
	function saveuser(){
		$this->cek_session();
		if($_POST){
			$username = $_POST['username'];
			$pengguna = $_POST['pengguna'];
			$password = $_POST['password'];
			$facebook = $_POST['facebook'];
			$twitter = $_POST['twitter'];
			$g_plus = $_POST['g_plus'];
			
			$temp = $this->blog_model->GetUser("where username = '$username'")->result_array();
			if($temp == NULL){
				$data = array(
					'username' => $username,
					'nama_lengkap' => $pengguna,
					'password' => $password,
					'facebook' => $facebook,
					'twitter' => $twitter,
					'g_plus' => $g_plus
				);
				$result = $this->blog_model->InsertData('userapp',$data);
				if($result == 1){
					header('location:'.base_url().'index.php/webadmin/users/1');
				}else{
					header('location:'.base_url().'index.php/webadmin/users/0');
				}
			}else{
				header('location:'.base_url().'index.php/webadmin/users/3');
			}
		}else{
			$this->load->view('webadmin/pagenotfound',array('title' => 'page not found'));
		}
	}
	
	function deleteuser($kode = 0){
		$this->cek_session();
		$result = $this->blog_model->DeleteData('userapp',array('kode_user' => $kode));
		if($result == 1){
			header('location:'.base_url().'index.php/webadmin/users/2');
		}else{
			header('location:'.base_url().'index.php/webadmin/users/0');
		}
	}
	
	function statistikpost(){
		$this->cek_session();
		$data = array(
			'post' => $this->blog_model->GetContent("where status = 'publish' order by counter")->result_array(),
			'session' => $this->session->userdata('login'),
			'title' => 'Dasboard admin calonpresident.blogspot.com - statistik'
		);
		$this->load->view('webadmin/statistik_post',$data);
	}
	
	function statistikvisitor(){
		$this->cek_session();
		//page view hari ini, kemarin, bulan ini dan sepanjang waktu
		//visitor OS, browser, lokasi
		$tanggal_wingi = date("d");
		$view_stat = array(
			'day' => $this->blog_model->GetVisitor("where SUBSTRING(tanggal,1,10) = '".date("Y-m-d")."'")->num_rows(),
			'yesterday' => $this->blog_model->GetVisitor("where SUBSTRING(tanggal,1,10) = '".date("Y-m-d", strtotime("yesterday"))."'")->num_rows(),
			'mounth' => $this->blog_model->GetVisitor("where SUBSTRING(tanggal,1,7) = '".date("Y-m")."'")->num_rows(),
			'year' => $this->blog_model->GetVisitor("where SUBSTRING(tanggal,1,4) = '".date("Y")."'")->num_rows(),
			'sepanjang_waktu' => $this->blog_model->GetVisitor()->num_rows(),	
		);
		$data = array(
			'session' => $this->session->userdata('login'),
			'post' => $this->blog_model->GetContent("where status = 'publish' order by counter desc limit 5")->result_array(),
			'visitor' => $view_stat,
			'title' => 'Dasboard admin calonpresident.blogspot.com - statistik'
		);
		$this->load->view('webadmin/statistik_visitor',$data);
	}
	
	function listcomment($mess = -1){
		$this->cek_session();
		$data = array(
			'message' => $mess,
			'session' => $this->session->userdata('login'),
			'comment' => $this->blog_model->GetComment("order by kode_comment desc")->result_array(),
			'title' => 'Dasboard admin calonpresident.blogspot.com - komentar'
		);
		$this->load->view('webadmin/comment',$data);
	}
	
	function publishingcomment($kode = 0){
		$this->cek_session();
		$data = array('status' => 'publish');
		$result = $this->blog_model->UpdateData('komentar',$data,array('kode_comment' => $kode));
		if($result == 1){
			header('location:'.base_url().'index.php/webadmin/listcomment/1');
		}else{
			header('location:'.base_url().'index.php/webadmin/listcomment/0');
		}
	}
	
	function deletingcomment($kode = 0){
		$this->cek_session();
		$result = $this->blog_model->DeleteData('komentar',array('kode_comment' => $kode));
		if($result == 1){
			header('location:'.base_url().'index.php/webadmin/listcomment/3');
		}else{
			header('location:'.base_url().'index.php/webadmin/listcomment/0');
		}
	}
	
	function replycomment($kode = 0){
		$this->cek_session();
		$data = array(
			'comment' => $this->blog_model->GetComment("where content.kode_content = '$kode' order by kode_comment")->result_array(),
			'session' => $this->session->userdata('login'),
			'title' => 'Dasboard admin calonpresident.blogspot.com - balas komentar'
		);
		$this->load->view('webadmin/commentreply',$data);
	}
	
	function myreply(){
		$this->cek_session();
		if($_POST){
			$data_sess = $this->session->userdata('login');
			$data = array(
				'kode_content' => $_POST['kode_content'],
				'isi' => $_POST['mycomment'],
				'status' => 'publish',
				'pengirim' => $data_sess['pengguna'],
				'website' => 'calonpresident.blogspot.com',
				'tanggal' => date("Y-m-d H:i:s")
			);
			$result = $this->blog_model->InsertData('komentar',$data);
			if($result == 1){
				header('location:'.base_url().'index.php/webadmin/listcomment/2');
			}else{
				header('location:'.base_url().'index.php/webadmin/listcomment/0');
			}
		}else{
			$this->load->view('webadmin/pagenotfound',array('title' => 'page not found'));
		}
	}
	
	function settingdasar($mess = -1){
		$this->cek_session();
		$data = array(
			'session' => $this->session->userdata('login'),
			'message' => $mess,
			'setting' => $this->blog_model->GetSetting()->result_array(),			
			'title' => 'Dasboard admin calonpresident.blogspot.com - setting dasar'
		);	
		$this->load->view('webadmin/setting_dasar',$data);
	}
	
	function savesettingdasar(){
		$this->cek_session();
		if($_POST){
			$site_title = $_POST['site_title'];
			$deskripsi = $_POST['deskripsi'];
			$limit_content = $_POST['limit_content'];
			$fb = $_POST['fb'];
			$fb_fans = $_POST['fb_fans'];
			$twitter = $_POST['twitter'];
			$g_plus = $_POST['g_plus'];
			$email = $_POST['email'];
			
			$data = array(
				'judul_blog' => $site_title,
				'deskripsi_blog' => $deskripsi,
				'limit_content' => $limit_content,
				'facebook' => $fb,
				'facebook_fans_page' => $fb_fans,
				'twitter' => $twitter,
				'g_plus' => $g_plus,
				'email' => $email
			);
			$result = $this->blog_model->UpdateData('setting',$data,array('kode_blog' => '1'));
			if($result == 1){
				header('location:'.base_url().'index.php/webadmin/settingdasar/1');
			}else{
				header('location:'.base_url().'index.php/webadmin/settingdasar/0');
			}
		}else{
			$this->load->view('webadmin/pagenotfound',array('title' => 'page not found'));
		}
	}
	
	function saveinformation(){
		if($_POST){
			$data = array(
				'information' => $_POST['information']
			);
			$result = $this->blog_model->UpdateData('setting',$data,array('kode_blog' => '1'));
			if($result == 1){
				header('location:'.base_url().'index.php/webadmin/settingdasar/1');
			}else{
				header('location:'.base_url().'index.php/webadmin/settingdasar/0');
			}
		}else{
			$this->load->view('webadmin/pagenotfound',array('title' => 'page not found'));
		}
	}
	
	function settingprofile($mess = -1){
		$this->cek_session();
		$data_sess = $this->session->userdata('login');
		$data_user = $this->blog_model->GetUser("where username = '".$data_sess['username']."'")->result_array();
		$data = array(
			'session' => $this->session->userdata('login'),
			'kode_user' => $data_user[0]['kode_user'],
			'username' => $data_user[0]['username'],
			'nama_lengkap' => $data_user[0]['nama_lengkap'],
			'fb' => $data_user[0]['facebook'],
			'twitter' => $data_user[0]['twitter'],
			'g_plus' => $data_user[0]['g_plus'],
			'about' => $data_user[0]['about'],
			'message' => $mess,
			'title' => 'Dasboard admin calonpresident.blogspot.com - setting profile'
		);
		$this->load->view('webadmin/setting_profile',$data);
	}
	
	function saveprofile(){
		$this->cek_session();
		if($_POST){
			$data_sess = $this->session->userdata('login');
			
			$kode_user = $_POST['kode_user'];
			$username = $_POST['username'];
			$nama_lengkap = $_POST['nama_lengkap'];
			$facebook = $_POST['facebook'];
			$g_plus = $_POST['g_plus'];
			$twitter = $_POST['twitter'];
			$about = $_POST['about'];
			$password = $_POST['password'];
			
			if($password == $data_sess['password']){
				$data = array(
					'username' => $username,
					'nama_lengkap' => $nama_lengkap,
					'facebook' => $facebook,
					'twitter' => $twitter,
					'g_plus' => $g_plus,
					'about' => $about
				);
				$result = $this->blog_model->UpdateData('userapp',$data,array('kode_user'=>$kode_user));
				if($result == 1){
					$new_data_sess = array(
						'username' => $data_sess['username'],
						'pengguna' => $nama_lengkap,
						'password' => $data_sess['password']
					);
					$this->session->set_userdata('login',$new_data_sess);
					header('location:'.base_url().'index.php/webadmin/settingprofile/1');
				}else{
					header('location:'.base_url().'index.php/webadmin/settingprofile/0');
				}
			}else{
				header('location:'.base_url().'index.php/webadmin/settingprofile/0');
			}
		}else{
			$this->load->view('webadmin/pagenotfound',array('title' => 'page not found'));
		}
	}
	
	function settingpassword($mess = -1){
		$this->cek_session();
		$data_sess = $this->session->userdata('login');
		$data = array(
			'session' => $this->session->userdata('login'),
			'username' => $data_sess['username'],
			'message' => $mess,
			'title' => 'Dasboard admin calonpresident.blogspot.com - setting password'
		);
		$this->load->view('webadmin/setting_password',$data);
	}
	
	function savepassword(){
		$this->cek_session();
		if($_POST){
			$data_sess = $this->session->userdata('login');			
			$username = $_POST['username'];
			$password_lama = $_POST['password_lama'];
			$password_baru = $_POST['password_baru'];
			
			if($password_lama == $data_sess['password']){
				$data = array('password' => $password_baru);
				$result = $this->blog_model->UpdateData('userapp',$data,array('username' => $username));
				if($result == 1){
					$new_data_sess = array(
						'username' => $data_sess['username'],
						'pengguna' => $data_sess['pengguna'],
						'password' => $password_baru
					);
					$this->session->set_userdata('login',$new_data_sess);
					header('location:'.base_url().'index.php/webadmin/settingpassword/1');
				}else{
					header('location:'.base_url().'index.php/webadmin/settingpassword/0');
				}
			}else{
				header('location:'.base_url().'index.php/webadmin/settingpassword/0');
			}
		}else{
			$this->load->view('webadmin/pagenotfound',array('title' => 'page not found'));
		}
	}
	
	function destroyingsession(){
		$this->session->sess_destroy();
		session_start();
		session_destroy();
		header('location:'.base_url().'index.php/webadmin/login');
	}
	
	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'index.php/webadmin/login');
			exit(0);
		}
	}
}
