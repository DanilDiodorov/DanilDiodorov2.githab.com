<div class="s-bk-lf">
	<div class="acc-title"><font color = '#0000ff'>���������� �������</div>
</div>

<?PHP
$_OPTIMIZATION["title"] = "������� - ���������� �������";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();


?>

<div class="silver-bk">
<center><h2><font color="red">���������� ������� �� ������ ���������� ������ ����!</font></h2></center>
</div>