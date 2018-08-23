<div class="silver-bk">
<font color = '#000000'><h2><center>Нанять Рэпера</center></h2>
<p><h3>В этом магазине Вы можете нанять Рэпера. Каждый Рэпер получает прибыль, которую можно потом собрать  и обменять на реальные деньги. Каждый Рэпер пишет разную прибыль, чем дороже он, тем больше получает. Вы можете нанять любое их количество, рэперы не умирают, не исчезают и будут получать прибыль всегда. </p><p><font color="#808e04"><font color = '#FF0000'>Перед тем как купить нового Рэпера, следует собрать полученную прибыль!</h3></font></p>
                              
<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Нанять Рэпера";
$usid = $_SESSION["user_id"];
$refid = $_SESSION["referer_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

# Покупка нового дерева
if(isset($_POST["item"])){

$array_items = array(1 => "a_t", 2 => "b_t", 3 => "c_t", 4 => "d_t", 5 => "e_t");
$array_name = array(1 => "Фараон", 2 => "ЛСП", 3 => "РИКИ", 4 => "Гарри", 5 => "Окси");
$item = intval($_POST["item"]);
$citem = $array_items[$item];

	if(strlen($citem) >= 3){
		
		# Проверяем средства пользователя
		$need_money = $sonfig_site["amount_".$citem];
		if($need_money <= $user_data["money_b"]){
		
			if($user_data["last_sbor"] == 0 OR $user_data["last_sbor"] > ( time() - 60*20) ){
				
				$to_referer = $need_money * 0.1;
				# Добавляем дерево и списываем деньги
				$db->Query("UPDATE db_users_b SET money_b = money_b - $need_money, $citem = $citem + 1,  
				last_sbor = IF(last_sbor > 0, last_sbor, '".time()."') WHERE id = '$usid'");
				
				# Вносим запись о покупке
				$db->Query("INSERT INTO db_stats_btree (user_id, user, tree_name, amount, date_add, date_del) 
				VALUES ('$usid','$usname','".$array_name[$item]."','$need_money','".time()."','".(time()+60*60*24*15)."')");
				
				echo "<center><font color = 'green'><b><h3>Вы успешно наняли Рэпера!</h3></b></font></center><BR />";
				
				$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
				$user_data = $db->FetchArray();
				
			}else echo "<center><font color = 'red'><b><h3>Перед тем как нанять Рэпера следует собрать Прибыль!</h3></b></font></center><BR />";
		
		}else echo "<center><font color = 'red'><b><h3>Недостаточно серебра для покупки</h3></b></font></center><BR />";
	
	}else echo 222;

}

?>



<div class="fr-block">
	<form action="" method="post">
	<div class="cl-fr-lf">
		<img src="/img/fruit/lime.jpg" />
	</div>
	
	<div class="cl-fr-rg" style="padding-left:20px;">
		<div class="fr-te-gr-title"><b>Pharaoh</b></div>
		<div class="fr-te-gr"><font color = '#000000'>Получает Прибыли: <font color="#000000"><?=$sonfig_site["a_in_h"]; ?> в час</font></div>
		<div class="fr-te-gr"><font color = '#000000'>Стоимость: <font color="#000000"><?=$sonfig_site["amount_a_t"]; ?> серебра</font></div>
		<div class="fr-te-gr"><font color = '#000000'>Куплено: <font color="#000000"><?=$user_data["a_t"]; ?> шт.</font></div>
		<input type="hidden" name="item" value="1" />
		<input type="submit" value="Нанять" style="height: 30px;width:185px; margin-left:0px;" />
	</div>
	</form>
</div>

<div class="fr-block">
	<form action="" method="post">
	<div class="cl-fr-lf">
		<img src="/img/fruit/cherry.jpg" />
	</div>
	
	<div class="cl-fr-rg" style="padding-left:20px;">
		<div class="fr-te-gr-title"><b>LSP</b></div>
		<div class="fr-te-gr"><font color = '#000000'>Получает Прибыли: <font color="#000000"><?=$sonfig_site["b_in_h"]; ?> в час</font></div>
		<div class="fr-te-gr"><font color = '#000000'>Стоимость: <font color="#000000"><?=$sonfig_site["amount_b_t"]; ?> серебра</font></div>
		<div class="fr-te-gr"><font color = '#000000'>Куплено: <font color="#000000"><?=$user_data["b_t"]; ?> шт.</font></div>
		<input type="hidden" name="item" value="2" />
		<input type="submit" value="Нанять" style="height: 30px;width:185px; margin-left:0px;" />
	</div>
	</form>
</div>

<div class="fr-block">
	<form action="" method="post">
	<div class="cl-fr-lf">
		<img src="/img/fruit/gondon.jpg" />
	</div>
	
	<div class="cl-fr-rg" style="padding-left:20px;">
		<div class="fr-te-gr-title"><b>Rickey F</b></div>
		<div class="fr-te-gr"><font color = '#000000'>Получает Прибыли: <font color="#000000"><?=$sonfig_site["c_in_h"]; ?> в час</font></div>
		<div class="fr-te-gr"><font color = '#000000'>Стоимость: <font color="#000000"><?=$sonfig_site["amount_c_t"]; ?> серебра</font></div>
		<div class="fr-te-gr"><font color = '#000000'>Куплено: <font color="#000000"><?=$user_data["c_t"]; ?> шт.</font></div>
		<input type="hidden" name="item" value="3" />
		<input type="submit" value="Нанять" style="height: 30px;width:185px; margin-left:0px;" />
	</div>
	</form>
</div>
<div class="fr-block">
	<form action="" method="post">
	<div class="cl-fr-lf">
		<img src="/img/fruit/kiwi.jpg" />
	</div>
	
	<div class="cl-fr-rg" style="padding-left:20px;">
		<div class="fr-te-gr-title"><b>Гарри Топор</b></div>
		<div class="fr-te-gr"><font color = '#000000'>Получает Прибыли: <font color="#000000"><?=$sonfig_site["d_in_h"]; ?> в час</font></div>
		<div class="fr-te-gr"><font color = '#000000'>Стоимость: <font color="#000000"><?=$sonfig_site["amount_d_t"]; ?> серебра</font></div>
		<div class="fr-te-gr"><font color = '#000000'>Куплено: <font color="#000000"><?=$user_data["d_t"]; ?> шт.</font></div>
		<input type="hidden" name="item" value="4" />
		<input type="submit" value="Нанять" style="height: 30px;width:185px; margin-left:0px;" />
	</div>
	</form>
</div>

<div class="fr-block">
	<form action="" method="post">
	<div class="cl-fr-lf">
		<img src="/img/fruit/orange.jpg" />
	</div>
	
	<div class="cl-fr-rg" style="padding-left:20px;">
		<div class="fr-te-gr-title"><b>Oxxxymiron</b></div>
		<div class="fr-te-gr"><font color = '#000000'>Получает Прибыли: <font color="#000000"><?=$sonfig_site["e_in_h"]; ?> в час</font></div>
		<div class="fr-te-gr"><font color = '#000000'>Стоимость: <font color="#000000"><?=$sonfig_site["amount_e_t"]; ?> серебра</font></div>
		<div class="fr-te-gr"><font color = '#000000'>Куплено: <font color="#000000"><?=$user_data["e_t"]; ?> шт.</font></div>
		<input type="hidden" name="item" value="5" />
		<input type="submit" value="Нанять" style="height: 30px;width:185px; margin-left:0px;" />
	</div>
	</form>
</div>
<div class="clr"></div>
 </div>

