<?PHP
$_OPTIMIZATION["title"] = "��������� �������";
$_OPTIMIZATION["description"] = "������ ��������� ������";
$_OPTIMIZATION["keywords"] = "��������� �������";
?>
<div class="s-bk-lf">
	<div class="acc-title">�������</div>
</div>
<div class="silver-bk"><div class="clr"></div>	

<BR /><center><b>���������� ��������� 20 ������</b></center>
<BR />
<?PHP

$dt = time() - 60*60*48;

$db->Query("SELECT * FROM db_payment WHERE status = '3' AND date_add > '$dt' ORDER BY date_add DESC LIMIT 20");



if($db->NumRows() > 0){

$all_pay = 0;
$all_pay_sum = 0;

?>
<table class="table" style="width:600px;">
  <thead>
  <tr>
    <th align="center" width="50" class="m-tb">������������</th>
	<th align="center" width="50" class="m-tb">�����</th>
	<th align="center" width="50" class="m-tb">�������</th>
	<th align="center" width="50" class="m-tb">����</th>
  </tr>
</thead>

<?PHP

	while($data = $db->FetchArray()){
	$all_pay ++;
	$all_pay_sum += $data["sum"];
	?>
	<tr class="htt">
	<td align="center"><?=$data["user"]; ?></td>
    <td align="center"><?=sprintf("%.2f",$data["sum"]); ?> <?=$data["valuta"]; ?></td>
	<td align="center"><?=substr($data["purse"],0,-3); ?><font color = 'red'>XXX</font></td>
	<td align="center"><?=date("d.m.Y H:i:s",$data["date_add"]); ?></td>
  	</tr>
	<?PHP
	
	}

?>

</table>
<BR />
<?PHP


}else echo "<center><b>������� ���� �� �������������!</b></center><BR />";


?>
</div>

<BR />

<div class="s-bk-lf">
	<div class="acc-title">����������</div>
</div>
<div class="silver-bk"><div class="clr"></div>	

<BR /><center><b>���������� ��������� 20 ����������</b></center>
<BR />
<?PHP

$dt = time() - 60*60*48;

$db->Query("SELECT * FROM db_insert_money WHERE id > 0 ORDER BY date_add DESC LIMIT 20");



if($db->NumRows() > 0){

$all_pay = 0;
$all_pay_sum = 0;

?>
<table class="table" style="width:600px;">
  <thead>
  <tr>
    <th align="center" class="m-tb">������������</th>
	<th align="center" class="m-tb">�����</th>
	<th align="center" class="m-tb">����</th>
  </tr>
</thead>

<?PHP

	while($data = $db->FetchArray()){
	$all_pay ++;
	$all_pay_sum += $data["money"];
	?>
	<tr class="table">
	<td align="center"><?=$data["user"]; ?></td>
    <td align="center"><?=sprintf("%.2f",$data["money"]); ?> RUB </td>
	<td align="center"><?=date("d.m.Y H:i:s",$data["date_add"]); ?></td>
  	</tr>
	<?PHP
	
	}

?>

</table>
<BR />
<?PHP


}else echo "<center><b>���������� ���� ������!</b></center><BR />";


?>
</div>
</BR>