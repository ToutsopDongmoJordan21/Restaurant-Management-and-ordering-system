<html>
<title> View Users </title>
<style type="text/css">
label{
float: left;
width: 300px;
       font-weight: bold;
}
input, textarea{
width: 200px;
       margin-bottom: 9px;
}
br{
clear: left;
}
</style>
<script type="text/javascript" src="check_form_validate.js"></script>

<h1 style="text-align:center"> Users </h1><br/><br/>
<?php
	function update_user($user_id)
	{
		$dbc = mysql_connect('localhost','root','');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		if(!$user_id)
		{
			echo "<script type=\"text/javascript\">"."\n";
				echo "alert(\"No User Selected!!!\");"."\n";
			echo "</script>"."\n";
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">";
			return;
		}
		$query = "Select * from USER WHERE User_Id=$user_id";
		$user = mysql_query($query);
		$num_fields = mysql_num_fields($user);
		echo "<form name = \"form1\" action = \"update_user_values.php\" method =\"post\" align=\"center\" onsubmit=\"return checkscript()\">"."\n";
		echo "<table style=\"text-align:center;\" align=\"center\" width=\"400\">"."\n";
		for($i=0;$i<$num_fields;$i++)
		{
			echo "<tr>"."\n";
			echo "<td>"."\n";
			$field = mysql_field_name($user,$i);
			echo "<b>".$field."</b>"."\n";
			echo "</td>"."\n";
			echo "<td>"."\n";
			$res = mysql_result($user,0,$i);
			if($i)
				echo "<input type = \"text\" name = \"$field\" value=\"$res\">";
			else
				echo "<input type = \"text\" name = \"$field\" value=\"$res\" readonly=\"readonly\">";
			echo "</td>"."\n";
			echo "</tr>"."\n";
		}
		echo "</table>"."\n"."<br/>";
		echo "<input type=\"submit\" name=\"submitbutton\" value=\"Update\">"."\n";
		echo "</form>"."\n";
	}

?>
<body background="1.png">
<?php
	update_user(intval($_POST["user"]));
?>
</form>
</body>
</html>
