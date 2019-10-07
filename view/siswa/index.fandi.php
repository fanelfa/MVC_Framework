<b>SISWA</b>
<br/>
<?php

foreach ($data as $key=>$value) {
	echo (intval($key)+1).") ".$value['nama']." ".$value['kelas'];
	echo '<br/>';
}
?>

<br/>
<?php include HOME_DIR.'view/siswa/form_tambah.php' ?>
<!-- <a href="<?php self::url('/siswa?id=5'); ?>">klik 30</a> -->


<?php 
if(isset($_SESSION)){
	session_destroy(); 
}
?>