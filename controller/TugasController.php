<?php

include HOME_DIR.'\config\View.php';
include HOME_DIR.'\model\Tugas.php';

class TugasController{

	private $tugas;

	public function __construct(){
		$this->tugas = new Tugas();
	}

	public function index($request=null){
		if($request==null){
			$data = $this->tugas->readAll()->get();
			return View::render('view/tugas/index',$data);
		}else{
			print_r($request);
		}
	}

	public function create($request){
		unset($request['submit']);
		$this->tugas->create($request);
		$data = $this->tugas->readAll()->get();
		return View::redirect('/',$data);
	}

	public function showTambah(){
		return View::render('view/tugas/create');
	}

	public function edit($request){
		echo '<H1>'.$request['id'].'</H1>';
		echo '<H4>'.$request['time'].'</H4>';
		// echo urlencode('http://localhost/MVC_Framework/tugas/edit/3/lima%20jam');
	}

	public function edit2($request){
		echo '<H1>'.$request['id'].'</H1><br/>';
	}
}