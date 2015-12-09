
<?echo("<title>user mode</title>");?>

<script>
   funcion info() {

	var p = location.search.substring(1).split("=");
	p = unescape(p[1]);
	var a = p.split("+");
	for(var i=0;i<a.length;i=i+1){
		document.write(a[i]+" ");
	}
}
</script>

<p><b><font size=6>R442's Property</font></b></p>
<p>
<?

$link=mysql_connect("localhost","root","1234");
if(!$link){
	die("fail : ".mysql_error());
}

$db_selected=mysql_select_db("object",$link);
if(!$db_selected){
	die("db fail :".mysql_error($link));	
}	
mysql_query("SET NAMES 'utf8'"); 	  
$sql="SELECT * FROM o";
$result = mysql_query($sql) ;
$total_records=mysql_num_rows($result); 
?>
</p>

<table BORDER='1' ALIGN='CENTER'><tr ALIGN='CENTER'>	
<tr>
<td><b>&nbsp&nbsp Item</b></td>
<td><b>&nbsp&nbsp Id</b></td>
<td><b>&nbsp Location &nbsp</b></td>
<td><b>&nbsp User &nbsp</b></td>
<td><b>&nbsp Action</b></td>	
</tr>
<? for ($i=0;$i<$total_records;$i++) {$row = mysql_fetch_array($result);?> 
   <tr>
	<td>&nbsp&nbsp<? echo $row[item];?>&nbsp&nbsp&nbsp</td> 
	<td>&nbsp&nbsp<? echo $row[id];?>&nbsp&nbsp</td> 
	<td>&nbsp&nbsp<? echo $row[location];?></td>
	<td>&nbsp&nbsp<? echo $row[user];?>&nbsp&nbsp</td>
	<?if($row[user]==NULL){?>
 		<td><input type="button" onclick="info()" id=<? echo$row[id];?> value=Borrow></td>	
        <?}else{ ?>
	<td></td>
	<?}?>
  </tr> 

<?} ?>
</table>

