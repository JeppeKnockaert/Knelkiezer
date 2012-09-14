<?php include_once('header.tpl'); ?>
<?php 
	if ($user){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=vragen.php">';
       	exit;	
	}
	else{
?>
<p>Welkom bij knelkiezer!</p>
<a href="<?php echo $facebook->getLoginUrl(
							array(
								'display' => 'touch',
                            	'scope' => 'publish_stream,user_location'
                            )
                    ); 
?>">Login met facebook!</a>
<?php } ?>
<?php include_once('footer.tpl'); ?>

