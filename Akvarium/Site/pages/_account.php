<?PHP
$_OPTIMIZATION["title"] = "�������";
$_OPTIMIZATION["description"] = "������� ������������";
$_OPTIMIZATION["keywords"] = "�������, ������ �������, ������������";

# ���������� ������
if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; // �������� ������
		case "stats": include("pages/account/_story.php"); break; // ����������
		case "referals": include("pages/account/_referals.php"); break; // ��������
		case "farm": include("pages/account/_farm.php"); break; // ��� �����
		case "store": include("pages/account/_store.php"); break; // �����
		case "swap": include("pages/account/_swap.php"); break; // �������� �����
		case "bonus2": include("pages/account/_bonus2.php"); break; // ��������� �����
		case "gono4ki": include("pages/account/_gono4ki.php"); break; // �����
		case "market": include("pages/account/_market.php"); break; // �����
		case "payment": include("pages/account/_payment.php"); break; // ������� WM
		case "payment_qiwi": include("pages/account/_payment_qiwi.php"); break; // ������� QIWI
		case "insert": include("pages/account/_insert.php"); break; // ���������� �������
		case "config": include("pages/account/_config.php"); break; // ���������
		case "bonus": include("pages/account/_bonus.php"); break; // ���������� �����
		case "bonus1": include("pages/account/_bonus1.php"); break; // ���������� ����� �� �����
		case "bezproigrisha": include("pages/account/_bezproigrisha.php"); break; // ���
		case "bonus3": include("pages/account/_bonus3.php"); break; // ���
		case "ace": include("pages/account/_ace.php"); break; // ���
		case "lottery": include("pages/account/_lottery.php"); break; // �������
		case "kostik": include("pages/account/_kostik.php"); break; // �����
		case "tv": include("pages/account/_tv.php"); break; // ���	
		case "games": include("pages/account/_games.php"); break; // ���	
		case "chat": include("pages/account/_chat.php"); break; // ���		
		case "exit": @session_destroy(); Header("Location: /"); return; break; // ����� � �������
		case "statistics": include("pages/account/_statistics.php"); break; // ���������� ������
    # �������� ������
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");

?>
