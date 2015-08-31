<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$id = @$_POST['id'];
$title = @$_POST['title'];
$message = @$_POST['messagebox'];

//echo "test" . $id ;

if($_SESSION['username'] != null && $id != null && $title != null && $message != null)
{
        //更新資料庫資料語法
        $sql = "update all_messages set title='$title', context='$message' where ID='$id'";
        if(mysql_query($sql))
        {
                echo '修改成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
}
else
{
        echo '請勿空白!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>

