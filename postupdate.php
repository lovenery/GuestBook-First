<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include("mysql_connect.inc.php");

$id = $_GET["A"];

if($_SESSION['username'] != null)
{
        $sql = "SELECT * FROM all_messages where ID='$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);

        echo "<form name=\"form\" method=\"post\" action=\"postupdate_finish.php\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"$id\" />"; //隱藏流水號
        echo "留言名稱：<input type=\"text\" name=\"hahahaha\" value=\"$row[1]\" />(無法更改)<br>";
        echo "標題：<input type=\"text\" name=\"title\" value=\"$row[2]\" /> <br>";
        echo "留言內容：<textarea name=\"messagebox\" cols=\"45\" rows=\"5\" >$row[4]</textarea> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"發送\" />";
        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>