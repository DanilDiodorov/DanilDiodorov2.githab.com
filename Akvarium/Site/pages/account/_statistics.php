<?PHP
	$_OPTIMIZATION["title"] = "����������";
	$_OPTIMIZATION["description"] = "";
	$_OPTIMIZATION["keywords"] = "";
	$timeonline=time()-10;
	$db->Query("SELECT COUNT(*) FROM db_statday WHERE time >$timeonline");
	$nlnusr = $db->FetchRow();
	?>
	<div class="silver-bk"><div class="s-bk-lf">
	<h1><font color="#000000">����������</h1>
	<br>������������� ������:<br>
	<?=$nlnusr;?>

	<br>���?<br>
	<?php
	$db->Query("SELECT * FROM db_statday WHERE time >$timeonline order by name");
	while ($nameuser=$db->FetchArray()){
	if (empty($nameuser)) {
	$name = '�����'; } else {
	$name=$nameuser["name"];
	}
	echo "".$name.". ";
	}
	echo "<br>";
	?>

	<br></div>
	</div>
	<div class="clr"></div>	