<?PHP
$_OPTIMIZATION["title"] = "Настройки";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_a WHERE id = '$usid'");
$user_data = $db->FetchArray();

$cosh = $user_data["payeer"];
?>
<div class="s-bk-lf">
<div class="acc-title"><font color="black">Настройки</div></font>
</div>

<div class="silver-bk">
<div class="clr"></div>	

<div style="text-align: center;"><font color="orange"><h3>Смена пароля:</h3></font></b></div>
<BR />

<?PHP

	if(isset($_POST["old"])){
 
  $old = $func->IsPassword($_POST["old"]);
  $new = $func->IsPassword($_POST["new"]);

   if($old !== false AND strtolower($old) == strtolower($user_data["pass"])){
   
    if($new !== false){
    
     if( strtolower ($new) == strtolower ($_POST["re_new"])){
     
      $db->Query("UPDATE db_users_a SET pass = '$new' WHERE id = '$usid'");
        		
        $db->Query("SELECT * FROM db_users_a WHERE id = '$usid'");
        $user_data = $db->FetchArray();
        
        # Отправляем пароль
		$sender = new isender;
		$sender -> SetNewPassword($user_data["email"], $user_data["pass"], $user_data["email"]);
                
                echo "<center><font color = 'green'><b>Пароль изменен! Данные отправлены на Ваш E-mail!</b></font></center><BR />";
     
     }else echo "<center><font color = 'red'><b>Пароль и повтор пароля не совпадают!</b></font></center><BR />";
    
    }else echo "<center><font color = 'red'><b>Новый пароль имеет неверный формат!</b></font></center><BR />";
   
   }else echo "<center><font color = 'red'><b>Старый пароль заполнен неверно!</b></font></center><BR />";
  
 }

?>


<form action="" method="post">
<table width="330" border="0" align="center">
  <tr>
    <td><b><font color="black"><h3>Старый пароль:</h3></b></td>
    <td align="center"><input type="password" maxlength="20" class="ps_r" style="text-align: center" name="old" /></td>
  </tr>
  <tr>
    <td><b><font color="black"><h3>Новый пароль:</h3></b></td>
    <td align="center"><input type="password" maxlength="20" class="ps_r" style="text-align: center" name="new" /></td>
  </tr>
  <tr>
    <td><b><font color="black"><h3>Повтор пароля:</h3></b></td>
    <td align="center"><input type="password" maxlength="20" class="ps_r" style="text-align: center" name="re_new" /></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><BR /><input type="submit" value="Сменить пароль" "/></td>
  </tr>
</table>
</form>
<div style="text-align: center; "><font color = 'purple'><h3>Пароль должен содержать от 6 до 20 символов (только англ. символы)</h3></div>
<br>
<BR />
<BR />
</div>