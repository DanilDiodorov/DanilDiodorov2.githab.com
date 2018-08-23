<?PHP
$_OPTIMIZATION["title"] = "Последние выплаты";
$_OPTIMIZATION["description"] = "Список последних выплат";
$_OPTIMIZATION["keywords"] = "Последние выплаты";
?>
<div class="s-bk-lf">
	<div class="acc-title">Выплаты</div>
</div>
<div class="silver-bk"><div class="clr"></div>	

<BR /><center><b>Отображены последние 20 выплат</b></center>
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
    <th align="center" width="50" class="m-tb">Пользователь</th>
	<th align="center" width="50" class="m-tb">Сумма</th>
	<th align="center" width="50" class="m-tb">Кошелек</th>
	<th align="center" width="50" class="m-tb">Дата</th>
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


}else echo "<center><b>Выплаты пока не производились!</b></center><BR />";


?>
</div>

<BR />

<div class="s-bk-lf">
	<div class="acc-title">Пополнения</div>
</div>
<div class="silver-bk"><div class="clr"></div>	

<BR /><center><b>Отображены последние 20 пополнений</b></center>
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
    <th align="center" class="m-tb">Пользователь</th>
	<th align="center" class="m-tb">Сумма</th>
	<th align="center" class="m-tb">Дата</th>
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


}else echo "<center><b>Пополнений пока небыло!</b></center><BR />";


?>
</div>
</BR>