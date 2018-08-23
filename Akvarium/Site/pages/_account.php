<?PHP
$_OPTIMIZATION["title"] = "Аккаунт";
$_OPTIMIZATION["description"] = "Аккаунт пользователя";
$_OPTIMIZATION["keywords"] = "Аккаунт, личный кабинет, пользователь";

# Блокировка сессии
if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; // Страница ошибки
		case "stats": include("pages/account/_story.php"); break; // Статистика
		case "referals": include("pages/account/_referals.php"); break; // Рефералы
		case "farm": include("pages/account/_farm.php"); break; // Моя ферма
		case "store": include("pages/account/_store.php"); break; // Склад
		case "swap": include("pages/account/_swap.php"); break; // Обменный пункт
		case "bonus2": include("pages/account/_bonus2.php"); break; // Ежечасный бонус
		case "gono4ki": include("pages/account/_gono4ki.php"); break; // гонки
		case "market": include("pages/account/_market.php"); break; // Рынок
		case "payment": include("pages/account/_payment.php"); break; // Выплата WM
		case "payment_qiwi": include("pages/account/_payment_qiwi.php"); break; // Выплата QIWI
		case "insert": include("pages/account/_insert.php"); break; // Пополнение баланса
		case "config": include("pages/account/_config.php"); break; // Настройки
		case "bonus": include("pages/account/_bonus.php"); break; // Ежедневный бонус
		case "bonus1": include("pages/account/_bonus1.php"); break; // Ежедневный бонус на вывод
		case "bezproigrisha": include("pages/account/_bezproigrisha.php"); break; // Туз
		case "bonus3": include("pages/account/_bonus3.php"); break; // Туз
		case "ace": include("pages/account/_ace.php"); break; // Туз
		case "lottery": include("pages/account/_lottery.php"); break; // Лотерея
		case "kostik": include("pages/account/_kostik.php"); break; // Кости
		case "tv": include("pages/account/_tv.php"); break; // Чат	
		case "games": include("pages/account/_games.php"); break; // Чат	
		case "chat": include("pages/account/_chat.php"); break; // Чат		
		case "exit": @session_destroy(); Header("Location: /"); return; break; // Выход с профиля
		case "statistics": include("pages/account/_statistics.php"); break; // Статистика Онлайн
    # Страница ошибки
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");

?>
