<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
echo '<a href="logout.php">登出</a>  <br><br>';
?>

<h3>聯誼中心</h3>

<?php
//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['username'] != null)
{
        //echo '<a href="register.php">新增帳號</a>';
        
        //echo '<a href="update.php">修改會員資料</a>';
        //echo '<a href="delete.php">永久刪除帳號</a><br><br>';
    
        //將資料庫裡的所有會員資料顯示在畫面上
        $sql = "SELECT * FROM member_table";
        $result = mysql_query($sql);
        while($row = mysql_fetch_row($result))
        {
                 echo "ID：$row[1], " . 
                 "電話：$row[3], 想跟大家說的話：$row[5]<br><br>";
        }
        echo '<a href="index.php">回首頁</a>  <br><br>';
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>

