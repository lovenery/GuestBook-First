<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$id = @$_POST['id'];
$title = @$_POST['title'];
$message = @$_POST['messagebox'];

//判斷是否為空值
if($_SESSION['username'] != null && $id != null && $title != null && $message != null)
{
date_default_timezone_set("Asia/Taipei"); //設為台灣時間
$stamps = time(); //取得現在伺服器時間刻記
$today = getdate($stamps); //時間刻記轉換成陣列
$month = $today["month"]; //月
$day = $today["mday"]; //日
$year = $today["year"]; //年
$time = $today["hours"] . ":" . $today["minutes"] . ":" . $today["seconds"];

        //新增資料進資料庫語法
        $sql = "insert into all_messages ( postname , title , time , context) values ('$id', '$title',' $month $day, $year, $time','$message')";
        if(mysql_query($sql))
        {
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=post.php>';
        }
}
else
{
        echo '請勿空白!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>