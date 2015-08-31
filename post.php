<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include("mysql_connect.inc.php");

if($_SESSION['username'] != null)
{
        //將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $id = $_SESSION['username'];
        //若以下$id直接用$_SESSION['username']將無法使用
        $sql = "SELECT * FROM member_table where username='$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);

        echo "<form name=\"form\" method=\"post\" action=\"post_finish.php\">";
        echo "留言名稱：<input type=\"text\" name=\"id\" value=\"$row[1]\" />(可更改)<br>";
        echo "標題：<input type=\"text\" name=\"title\" /> <br>";
        echo "留言內容：<textarea name=\"messagebox\" cols=\"45\" rows=\"5\"></textarea> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"發送\" />";
        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>