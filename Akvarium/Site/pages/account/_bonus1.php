<?PHP
$_OPTIMIZATION["title"] = "Ежедневный бонус";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];
 
# Настройки бонусов
$bonus_min = 1;
$bonus_max = 5;

?>
<div class="s-bk-lf">
    <div class="acc-title"><h3><font color="blue">Бонус на вывод</h3></div>
</div>
<div class="silver-bk">
<div class="clr"></div>
<center><h4>Бонус выдется 1 раз в 24 часа.</h4></center>
<center><h4>Бонус выдаётся серебром на счёт для вывода.</h4></center>
<center><h4>Сумма бонуса генерируется случайно от <b><?=$bonus_min;?></b> до <b><?=$bonus_max;?></b> серебра.</font></h4></center>


<?PHP
$ddel = time() + 60*60*24;
$dadd = time();
$db->Query("SELECT COUNT(*) FROM db_bonus_list1 WHERE user_id = '$usid' AND date_del > '$dadd'");

$hide_form = false;

	if($db->FetchRow() == 0){
	
		# Выдача бонуса
		if(isset($_POST["bonus"])){
		
			$sum = rand($bonus_min, rand($bonus_min, $bonus_max) );
			
			# Зачилсяем юзверю
			$db->Query("UPDATE db_users_b SET money_p = money_p + '$sum' WHERE id = '$usid'");
			
			# Вносим запись в список бонусов
			
			
			$db->Query("INSERT INTO db_bonus_list1 (user, user_id, sum, date_add, date_del) VALUES ('$uname','$usid','$sum','$dadd','$ddel')");
			
			# Случайная очистка устаревших записей
			$db->Query("DELETE FROM db_bonus_list1 WHERE date_del < '$dadd'");
			
			echo "<center><font color = 'green'><b>На Ваш счет для вывода зачислен бонус в размере {$sum} серебра</b></font></center><BR />";
			
			$hide_form = true;
			
		}
			
			# Показывать или нет форму
			if(!$hide_form){
?>

<form action="" method="post">
<table width="330" border="0" align="center">
  <tr>
    <td align="center"></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="bonus" value="Получить бонус" style="height: 30px; margin-top:10px;"></td>
  </tr>
</table>
</form>
<?PHP
            }
    }else echo "<center><font color = 'black'><b><h2>Вы уже получали бонус за последние 24 часа</b></font></center></h2>"; 
?>

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">

<?PHP
$db->Query("SELECT * FROM db_bonus_list1 WHERE user = '$uname' LIMIT 1");
if($db->NumRows() > 0){
while($data_bonus = $db->FetchArray()){
?>
<center><h3><font color="red">Получить бонус  можно <?=date("d.m в H:i:s",$data_bonus["date_del"]) ;?></h3></font></center>
<?PHP
}
}else echo '<font color="blue"><center><h4>Вы давно не получали бонус. Получите!</font></h4>';
?>
<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="5" align="center"><h4>Последние 20 бонусов</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">ID</td>
    <td align="center" class="m-tb">Пользователь</td>
	<td align="center" class="m-tb">Сумма</td>
	<td align="center" class="m-tb">Дата</td>
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
  
	}else echo '<tr><td align="center" colspan="5">Нет записей</td></tr>'
  ?>

  
</table>

<div class="clr"></div>		
</div>





