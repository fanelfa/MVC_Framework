<?php 
session_start();
?>

<b>Ini redirect view broo...</b>
<br/>
<?php
$data = $_SESSION['data'];
foreach ($data as $key=>$value) {
	echo $key.") ".$value['nama']." ";
}
?>


<?php session_destroy(); ?>