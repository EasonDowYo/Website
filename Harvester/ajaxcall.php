<?php

	$link=mysqli_connect("localhost","root","lab611") or die ("無法開啟Mysql資料庫連結"); //建立mysql資料庫連結

	mysqli_select_db($link, "harvester"); //選擇資料庫abc

	$sql = 'SELECT * FROM data2 ORDER BY number DESC LIMIT 5'; //在test資料表中選擇所有欄位
// $sq2l='SELECT * INTO OUTFILE C:/Users/user/Desktop/try.txt FIELDS TERMINATED BY , ENCLOSED BY ' LINES TERMINATED BY \r FROM harvester.data';

	mysqli_query($link, "SET CHARACTER SET utf8");	// 送出Big5編碼的MySQL指令

	mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");




	$result = mysqli_query($link,$sql); // 執行SQL查詢

//$row = mysqli_fetch_assoc($result); //將陣列以欄位名索引

//$row = mysqli_fetch_row($result); //將陣列以數字排列索引

	$total_fields=mysqli_num_fields($result); // 取得欄位數

	$total_records=mysqli_num_rows($result);  // 取得記錄數
	
	$vol=array();
	$time=array();
	while($row = mysqli_fetch_array($result))
	{
		$vol[]=(double)$row['voltage'];
		$time[]=date('i:s');
	}
	$output=array($vol,$time);
	$output=json_encode($output);
	echo $output;


?>
