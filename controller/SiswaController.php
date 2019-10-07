<?php

include HOME_DIR.'\config\View.php';
include HOME_DIR.'\model\Siswa.php';

class SiswaController{

	private $siswa;
	private $view;

	public function __construct(){
		$this->siswa = new Model_Siswa();
		$this->view = new View();
	}

	public function index($request=null){
		if($request==null){
			$data = $this->siswa->readAll()->get();
			return View::render('view/view_Hello',$data);
			// return View::redirect('redirect',$data);
		}else{
			print_r($request);
		}
	}

	public function showRedirect(){
		return View::render('view/test_redirect');
	}

	public function create($request){
		$this->siswa->create($request);
		echo 'berhasil input';
	}
}