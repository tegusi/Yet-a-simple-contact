<html>
  <body>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <?php
       $name=$_POST[name];
      // $name=iconv("UTF-8", "GBK", $name); 
$f=fopen($name,"w+");
   fwrite($f,"$_POST[university]\n");
   fwrite($f,"$_POST[major]\n");
   fwrite($f,"$_POST[city]\n");
   fwrite($f,"$_POST[phone]\n");
   fclose($f);
   echo $_POST[name]."添加成功";

   
   /*
   mysql_query("set names 'utf-8'");
   mysql_query("SET character_set_client = utf8");
   mysql_query("SET character_set_connection = utf8");
   mysql_query("SET character_set_database = utf8");
   mysql_query("SET character_set_results = utf8");
   mysql_query("SET character_set_server = utf8");
echo $_POST["name"];
$con=mysql_connect("localhost","zjwdb_298383","Tegusi970813");
if(!$con)
{
	die("夭寿啦".my_sql.error());
}

mysql_select_db("zjwdb_298383",$con);

$sql="INSERT INTO friends_data (name,university,major,city,phone) VALUES ('$_POST[name]','$_POST[university]','$_POST[major]','$_POST[city]','$_POST[phone]')";

if(!mysql_query($sql,$con))
{
	die("夭寿啦".mysql_error());
}
echo "添加成功";

   mysql_close($con);
   */
?>

</br>
</body>
</html>
