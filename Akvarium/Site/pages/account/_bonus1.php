<?PHP
$_OPTIMIZATION["title"] = "���������� �����";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];
 
# ��������� �������
$bonus_min = 1;
$bonus_max = 5;

?>
<div class="s-bk-lf">
    <div class="acc-title"><h3><font color="blue">����� �� �����</h3></div>
</div>
<div class="silver-bk">
<div class="clr"></div>
<center><h4>����� ������� 1 ��� � 24 ����.</h4></center>
<center><h4>����� ������� �������� �� ���� ��� ������.</h4></center>
<center><h4>����� ������ ������������ �������� �� <b><?=$bonus_min;?></b> �� <b><?=$bonus_max;?></b> �������.</font></h4></center>


<?PHP
$ddel = time() + 60*60*24;
$dadd = time();
$db->Query("SELECT COUNT(*) FROM db_bonus_list1 WHERE user_id = '$usid' AND date_del > '$dadd'");

$hide_form = false;

	if($db->FetchRow() == 0){
	
		# ������ ������
		if(isset($_POST["bonus"])){
		
			$sum = rand($bonus_min, rand($bonus_min, $bonus_max) );
			
			# ��������� ������
			$db->Query("UPDATE db_users_b SET money_p = money_p + '$sum' WHERE id = '$usid'");
			
			# ������ ������ � ������ �������
			
			
			$db->Query("INSERT INTO db_bonus_list1 (user, user_id, sum, date_add, date_del) VALUES ('$uname','$usid','$sum','$dadd','$ddel')");
			
			# ��������� ������� ���������� �������
			$db->Query("DELETE FROM db_bonus_list1 WHERE date_del < '$dadd'");
			
			echo "<center><font color = 'green'><b>�� ��� ���� ��� ������ �������� ����� � ������� {$sum} �������</b></font></center><BR />";
			
			$hide_form = true;
			
		}
			
			# ���������� ��� ��� �����
			if(!$hide_form){
?>

<form action="" method="post">
<table width="330" border="0" align="center">
  <tr>
    <td align="center"></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="bonus" value="�������� �����" style="height: 30px; margin-top:10px;"></td>
  </tr>
</table>
</form>
<?PHP
            }
    }else echo "<center><font color = 'black'><b><h2>�� ��� �������� ����� �� ��������� 24 ����</b></font></center></h2>"; 
?>

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">

<?PHP
$db->Query("SELECT * FROM db_bonus_list1 WHERE user = '$uname' LIMIT 1");
if($db->NumRows() > 0){
while($data_bonus = $db->FetchArray()){
?>
<center><h3><font color="red">�������� �����  ����� <?=date("d.m � H:i:s",$data_bonus["date_del"]) ;?></h3></font></center>
<?PHP
}
}else echo '<font color="blue"><center><h4>�� ����� �� �������� �����. ��������!</font></h4>';
?>
<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="5" align="center"><h4>��������� 20 �������</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">ID</td>
    <td align="center" class="m-tb">������������</td>
	<td align="center" class="m-tb">�����</td>
	<td align="center" class="m-tb">����</td>
  </tr>
  <?PHP
  
  $db->Query("SELECT * FROM db_bonus_list1 ORDER BY id DESC LIMIT 20");
  
	if($db->NumRows() > 0){
  
  		while($bon = $db->FetchArray()){
		
		?>
		<tr class="htt">
    		<td align="center"><?=$bon["id"]; ?></td>
    		<td align="center"><?=$bon["user"]; ?></td>
    		<td align="center"><?=$bon["sum"]; ?></td>
			<td align="center"><?=date("d.m.Y",$bon["date_add"]); ?></td>
  		</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="5">��� �������</td></tr>'
  ?>

  
</table>

<div class="clr"></div>		
</div>





