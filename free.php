<?
include('top_page.php');
include('middle.php');
?>
<center><h2><font color=white>FREE DISHES AND FOOD VOUCHERS</font></h2></center>
<?

if ( isset($_SESSION['userlogin']) && $_SESSION['userlogin'] == 1 )
{
  
	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	
	echo "<font size=4 color=white>
	YOU MUST MENTION YOU WISH TO USE VOUCHER WHEN PLACING YOUR ORDER. 
	</font>
	<ul>
	";
	$result = $mysqli->query("SELECT * FROM `vouchers` WHERE STATUS = 'active' AND valid > CURDATE() ORDER BY id_discount");
	while ( $data = $result->fetch_object() )
	{
		echo "<li><a href=voucher.php?id=".$data->id_discount."><font color=yellow size=3>".$data->offer."</font></a></li><br>";
	}
   echo "<font size=4 color=white><BR>
	VOUCHER CAN NOT BE USED ON SATURDAYS.
	</font>";
}else{
	echo "
			<font color=white size=4>
			<p><b>&nbsp&nbsp&nbsp You must log in to be able to get exclusive vouchers and free dishes.</b><br>
			<CENTER>
			<h4>STEP 1</h4>
			Create your account.
		
			<h4>STEP 2</h4>
			Return to this page once you login.
			<BR><BR>
			
			</center>		
				
			<a href=register.php><h3><center>CLICK HERE TO REGISTER</h3></center></a>			
			
			</font>
		";
}

include('footer.php');
?>
