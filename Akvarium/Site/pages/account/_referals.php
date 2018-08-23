<div class="s-bk-lf">
	<div class="acc-title"><font color = '#0000ff'>Партнерская программа</div>
</div>

<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Партнерская программа";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id = '$user_id'");
$refs = $db->FetchRow();
?>  

<div class="silver-bk"><font color = '#000000'><h3>Приглашайте в игру своих друзей и знакомых. Вы будете получать  10% от каждого пополнения баланса  
приглашенным Вами человеком на Счет для ВЫПЛАТЫ. Доход ни чем не ограничен.</h3>
<h3>Ниже представлена ссылка для привлечения и количество приглашенных Вами людей.</h3><br /><br />
<center><img src="/img/piar-link.png" style="vertical-align:-2px; margin-right:5px;" /><font color="#000;"><font color = '#ff0000'>http://<?=$_SERVER['HTTP_HOST']; ?>/?i=<?=$_SESSION["user_id"]; ?></font></center>
</br>
<center><h3 style=" margin-top: 10; ">Баннер (468x60):</h3></center>
<center><h3>Ссылка на баннер: http://rap-money.ru/img/468x60.gif</h3></center>
<center><img src="http://rap-money.ru/img/468x60.gif" /></a></center>
<center><textarea onmouseover="this.select()" style="width: 400px; height: 80px;"><a href="http://rap-money.ru/?i=<?=$_SESSION["user_id"]; ?>" target="_blank"></center>
<center><img src="http://rap-money.ru/img/468x60.gif" /></a></center>
</textarea></center><br>
<center><h3 style=" margin-top: 10; ">Баннер 2 (468x60):</h3></center>
<center><h3>Ссылка на баннер: http://rap-money.ru/img/ban468.gif</h3></center>
<center><img src="http://rap-money.ru/img/ban468.gif" /></a></center>
<center><textarea onmouseover="this.select()" style="width: 400px; height: 80px;"><a href="http://rap-money.ru/?i=<?=$_SESSION["user_id"]; ?>" target="_blank"></center>
<center><img src="http://rap-money.ru/img/ban468.gif" /></a></center>
</textarea></center><br>
<center><h3 style=" margin-top: 10; ">Баннер 3 (200x300):</h3></center>
<center><h3>Ссылка на баннер: http://rap-money.ru/img/200x300.gif</h3></center>
<center><img src="http://rap-money.ru/img/200x300.gif" /></a></center>
<center><textarea onmouseover="this.select()" style="width: 400px; height: 80px;"><a href="http://rap-money.ru/?i=<?=$_SESSION["user_id"]; ?>" target="_blank"></center>
<center><img src="http://rap-money.ru/img/200x300.gif" /></center></a>
</textarea></center><br>

<p><center>Количество ваших рефералов: <font color="#000;"><?=$refs; ?> чел.</font></center></p>

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width='98%'>
<tr height='25' valign=top align=center>
	<td class="m-tb"> Логин </td>
	<td class="m-tb"> Дата регистрации </td>
	<td class="m-tb"> Доход от партнера </td>
</tr>

<?PHP
  $all_money = 0;
  $db->Query("SELECT db_users_a.user, db_users_a.date_reg, db_users_b.to_referer FROM db_users_a, db_users_b 
  WHERE db_users_a.id = db_users_b.id AND db_users_a.referer_id = '$user_id' ORDER BY to_referer DESC");
  
	if($db->NumRows() > 0){
  
  		while($ref = $db->FetchArray()){
		
		?>
		<tr height="25" class="htt" valign="top" align="center">
			<td align="center"> <?=$ref["user"]; ?> </td>
			<td align="center"> <?=date("d.m.Y в H:i:s",$ref["date_reg"]); ?> </td>
			<td align="center"> <?=sprintf("%.2f",$ref["to_referer"]); ?> </td>
		</tr>

		<?PHP
		$all_money += $ref["to_referer"];
		}
  
	}else echo '<tr><td align="center" colspan="3">У вас нет рефералов</td></tr>'
  ?>

</table>

<div class="clr"></div>	
</div>

<div class="clr"></div>	