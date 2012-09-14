<?php include_once('header.tpl'); ?>
<?php 
	if ($user){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=vragen.php">';
       	exit;	
	}
	else{
?>
<p>Welkom bij knelkiezer!</p>
<p>Log in met facebook </p>
<?php } ?>
<?php include_once('footer.tpl'); ?>

