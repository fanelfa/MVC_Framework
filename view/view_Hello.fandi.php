<!-- <?php session_start(); ?> -->

<b>Ini View broo...</b>
<br/>
<?php
// $data = $_SESSION;
foreach ($data as $key=>$value) {
	echo $key.") ".$value['nama']." ";
	echo '<br/>';
}
?>


<!-- <?php session_destroy(); ?> -->