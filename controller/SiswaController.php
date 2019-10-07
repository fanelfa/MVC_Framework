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
			return View::render('view/siswa/index',$data);
		}else{
			print_r($request);
		}
	}

	public function create($request){
		$this->siswa->create($request);
		$data = $this->siswa->readAll()->get();
		return View::render('view/siswa/index',$data);
	}
}