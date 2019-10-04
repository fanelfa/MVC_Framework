<?php

include __DIR__.'\..\View.php';
include __DIR__.'\..\model\Siswa.php';

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
		}else{
			print_r($request);
		}
	}
}