
<b>Ini redirect view broo...</b>
<br/>
<?php
$data = $_SESSION['data'];
foreach ($data as $key=>$value) {
	echo $key.") ".$value['nama']." ";
}
?>


<?php 
if(isset($_SESSION)){
	session_destroy(); 
}
?>