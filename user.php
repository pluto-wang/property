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
    <TABLE BORDER='1' ALIGN='CENTER'><TR ALIGN='CENTER'>;	
  <tr>
    <td>Item</td>
    <td>Id</td>
    <td>Location</td>
    <td>Borrower</td>
 </tr>
<? for ($i=0;$i<$total_records;$i++) {$row = mysql_fetch_array($result);  ?> 
  <tr>
  <td><? echo $row[item];?></td> 
 <td><? echo $row[id];?></td> 
 <td><? echo $row[location];?></td>
 <td><? echo $row[user];?></td>  
</tr> 
		  
<? } ?>
</table>
