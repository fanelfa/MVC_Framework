<?php

include_once 'View.php';

// $v = new View();
$data = ['nama'=>'Ari'];
// View::render('view/view_Hello', $data);
View::redirect('view/view_Hello', $data);
// $v->view('view_Hello');