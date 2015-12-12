
<?echo("<title>user mode</title>");?>

<p><b><font size=6>R442's Property</font></b></p>

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
$result1 = mysql_query($sql) ;
$result2 = mysql_query($sql) ;
$total_records=mysql_num_rows($result1); 
?>

<script language="javascript" type="application/javascript">
   function info() {

	var p = location.search.substring(1).split("=");
	p = unescape(p[1]);
	var a = p.split("+");
	for(var i=0;i<a.length;i=i+1){
		document.write(a[i]+" ");
	}
}

 var myWindow;
 function bw(id){
    
	myWindow = window.open("", "Borrow", "width=400, height=300");
	myWindow.document.write("<head><title>Borrow</title></head>");
	myWindow.document.write("<p><b><font size=5>The information of your borrow is as follow:</font></b></p>");
	<? for ($i=0;$i<$total_records;$i++){ $r=mysql_fetch_array($result1);?>
		var d ='<?echo $r[id];?>';
		if(d==id){
			var item ='<?echo $r[item];?>';
			myWindow.document.write("ITEM : ");
			myWindow.document.write(item+" <br>");

			myWindow.document.write("ID : ");
			myWindow.document.write(id+" <br>");
			var date=new Date();
			myWindow.document.write("DATE : ");
			myWindow.document.write(date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate());		
		}

	<?}?>
 }

</script>


<table BORDER='3' ALIGN='CENTER'><tr ALIGN='CENTER'>	
<tr>
<td><b>&nbsp&nbsp Item</b></td>
<td><b>&nbsp&nbsp Id</b></td>
<td><b>&nbsp Location &nbsp</b></td>
<td><b>&nbsp User &nbsp</b></td>
<td><b>&nbsp Action</b></td>	
</tr>
<? for ($i=0;$i<$total_records;$i++) {$row = mysql_fetch_array($result2);?> 
   <tr>
	<td>&nbsp&nbsp<? echo $row[item];?>&nbsp&nbsp&nbsp</td> 
	<td>&nbsp&nbsp<? echo $row[id];?>&nbsp&nbsp</td> 
	<td>&nbsp&nbsp<? echo $row[location];?></td>
	<td>&nbsp&nbsp<? echo $row[user];?>&nbsp&nbsp</td>
	<?if($row[user]==NULL){?>
	<td><input type="button" onclick="bw('<?echo $row[id];?>')" value=Borrow></td>	
        <?}else{ ?>
	<td></td>
	<?}?>
  </tr> 

<?} ?>
</table>

