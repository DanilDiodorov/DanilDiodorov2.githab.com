<div class="s-bk-lf">
	<div class="acc-title"><font color = '#0000ff'>Пополнение баланса</div>
</div>

<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Пополнение баланса";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();


?>

<div class="silver-bk">
<center><h2><font color="red">Пополнения Закрыты До Старта Следующего Сезона Игры!</font></h2></center>
</div>