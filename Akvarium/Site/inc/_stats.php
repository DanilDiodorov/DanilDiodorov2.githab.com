 
<?PHP
$tfstats = time() - 60*60*24;
$db->Query("SELECT 
(SELECT COUNT(*) FROM db_users_a) all_users,
(SELECT SUM(insert_sum) FROM db_users_b) all_insert, 
(SELECT SUM(payment_sum) FROM db_users_b) all_payment, 
(SELECT COUNT(*) FROM db_users_a WHERE date_reg > '$tfstats') new_users");
$stats_data = $db->FetchArray();

?>
	
<div class="stat">
<font color = '#000000'>	<div class="h-title"><font color = '#FFFFFF'>Статистика</div>
	<div class="st-lf">
	<div class="line"><font color = '#000000'>Всего участников: </div>
	<div class="line"><font color = '#000000'>Новых за 24 часа: </div>
	<div class="line"><font color = '#000000'>Выплачено: </div>
	<div class="line"><font color = '#000000'>Пополнено: </div>
	<div class="line"><font color = '#000000'>Резерв: </div>
	</div>
	<div class="st-rg">
	<div class="line-st"><?=$stats_data["all_users"]+0; ?> чел.</div>
	<div class="line-st"><?=$stats_data["new_users"]+0; ?> чел.</div>
	<div class="line-st"><a href="/payments" style="text-decoration:none; color: blue;"><?=sprintf("%.2f",$stats_data["all_payment"]+0); ?></a> <?=$config->VAL; ?></div>
	<div class="line-st"><?=sprintf("%.2f",$stats_data["all_insert"]); ?> <?=$config->VAL; ?></div>
	<div class="line-st"><?=sprintf("%.2f",$stats_data["all_insert"]-$stats_data["all_payment"]); ?> <?=$config->VAL; ?></div>
	</div>
	<div class="clr"></div>
	<div class="st-time"><img style="vertical-align:-5px; margin-right:5px;" src="/img/clock.png" />Проекту пошел: <font color="#f77827"><?=intval(((time() - $config->SYSTEM_START_TIME) / 86400 ) +0); ?> - й</font> день(5 сезон)</div>
 

</div>
<a href="http://rap-money.ru/mon" target="_blank"><img src="http://rap-money.ru/img/88x31.gif" width="88" height="31" border="0" /></a>
<a href="http://top-inves.ru"><img border="0" title="" src="http://top-inves.ru/top-invest.gif" width="88" height="31" border="0" /></a>
<a href="http://amarantapost.webnode.ru/" target=_blank><img src="http://files.amarantapost.webnode.ru/200000006-359c536984/button1.gif" border="0" title="" width="88" height="31" alt=""></a>
<a href="http://monitoringfermi.ru" target="_blank"><img src="http://monitoringfermi.ru/img/88x31.gif" width="88" height="31" border="0" /></a>
<a href="/" target="_blank"><img src="http://rap-money.ru/img/Monitor.gif" width="88" height="31" border="0" /></a>
<a href=http://monitor-tuz.ru/ferm_pay" target="_blank"><img src="http://rap-money.ru/img/tuz.gif" width="88" height="31" border="0" /></a>
<div class="acc-title"><font color = '#000000'>Последние 5 пополнений</div>
<?PHP

$dt = time() - 60*60*48;

$db->Query("SELECT * FROM db_insert_money WHERE id > 0 ORDER BY date_add DESC LIMIT 5");

?>
<?PHP

	while($data = $db->FetchArray()){
	$all_pay ++;
	$all_pay_sum += $data["money"];
	?>
<table>
	<td align="center"><div class="silver-bk" style="width:115px; height:20px; font-size:15px;"><font color="red"><?=$data["user"]; ?></font></td>
	</div>
    <td align="center"> <div class="silver-bk"style="width:115px; height:20px; font-size:15px;"><font color="red"><?=sprintf("%.2f",$data["money"]); ?> RUB </font></td>
    </div>
  	</tr>
  </table>	
	<?PHP
	
	}

?>
<div class="stat">
<div class="h-title"><font color = '#FFFFFF'>Реклама</div>
<div>
<center><a href="http://linkslot.ru/link.php?id=93607" target="_blank">Купить ссылку здесь за <span id="linprice_93607"></span> руб.</a><div id="linkslot_93607" style="margin: 10px 0;"><script src="https://linkslot.ru/lincode.php?id=93607" async></script></div><a href="http://linkslot.ru/?ref=BodyaDonskoy" target="_blank">Поставить к себе на сайт</a></center>
<div class="clr"></div>
</div>
<div class="clr"></div>
</div>
  </tr>
	<tr>
