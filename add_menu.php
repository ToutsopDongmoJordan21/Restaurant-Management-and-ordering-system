<html>
<title> ADD MENU ITEMS </title>
<?php
	function add_menu_items($food_name,$food_price,$food_type,$food_category)
	{
	
		$dbc = mysql_connect('localhost','root','');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$items = "\"".$food_name."\",\"".$food_price."\",\"".$food_type."\",\"".$food_category."\"";
		$query = "insert into `MENU`(`Name`,`Price`,`Type`,`Category`)values (".$items.");";
		$result = mysql_query($query);
	}
	add_menu_items($_POST["food_name"],$_POST["food_price"],$_POST["food_type"],$_POST["food_category"]);
?>
<script type="text/javascript">
	function done() 
	{
		alert("New Item Added!!!");
	}
</script>
<body onload="done()" background = "1.png">
<meta HTTP-EQUIV="REFRESH" content="0; url=admin.html">
</body>
</html>
