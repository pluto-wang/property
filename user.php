<?php
 echo("<title>user mode</title>");
?>
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
    <TABLE BORDER='1' ALIGN='CENTER'><TR ALIGN='CENTER'>	
  <tr>
    <td>&nbsp&nbsp Item</td>
    <td>&nbsp&nbsp Id  </td>
    <td>&nbsp&nbsp Location&nbsp  </td>
    <td>&nbsp&nbsp User &nbsp </td>
    <td>&nbsp Action</td>	
 </tr>
<? for ($i=0;$i<$total_records;$i++) {$row = mysql_fetch_array($result); ?> 
  <tr>
<td>&nbsp&nbsp<? echo $row[item];?>&nbsp&nbsp&nbsp</td> 
  <td>&nbsp&nbsp<? echo $row[id];?>&nbsp&nbsp</td> 
  <td>&nbsp&nbsp<? echo $row[location];?></td>
  <td>&nbsp&nbsp<? echo $row[user];?>&nbsp&nbsp</td> 
  <td><input type="button" onclick="php_function()" value="borrow"></td>
</tr> 
		  
 <?} ?>
</table>
