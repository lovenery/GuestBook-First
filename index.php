<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
	<title>辰旭的留言板</title>
<link rel="stylesheet" href="index.css" type="text/css">
</head>

<body>
<div style="overflow-x:auto;overflow-y:auto;">

<?php
include("mysql_connect.inc.php");
if(@$_SESSION['username'] != null)
{
        //將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $id = $_SESSION['username'];
        //若以下$id直接用$_SESSION['username']將無法使用
        $sql = "SELECT * FROM member_table where username='$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
				echo "Hello!  $row[1]   ";
				
				echo '<a href="logout.php">		登出</a>  <br>';
				echo '<a href="update.php">修改會員資料</a><br>';
				echo '<a href="member.php">聯誼中心</a> <br/><br/>';
}
else
{
				echo 'Hi,訪客';
        echo '<a href="login.php">	登入			</a>';
        echo '<a href="register.php">註冊</a>';
}
?>

<h2>
留言板
</h2>

<?php
include("mysql_connect.inc.php");
if(@$_SESSION['username'] != null)
{
				echo '<a href="post.php">留言	</a><br/><br/>';
}
else
{
				echo '留言前請先登入 <br/><br/>' ;
}
?>

<?php
        //將資料庫裡的所有會員資料顯示在畫面上
        $sql = "SELECT * FROM all_messages";
        $result = mysql_query($sql);
        $i=1;
        while($row = mysql_fetch_row($result))
        {
        				
                 echo "<br/><b>編號</b>： $i ," . //歷史編號：$row[0],
                 " 作者：$row[1], 標題：$row[2]".
								" 時間：$row[3]<br/>內容：$row[4]";
								$i++;
								
								
								$sql_reply = "SELECT * FROM all_reply";
        				$result_reply = mysql_query($sql_reply);
								while($row_reply = mysql_fetch_row($result_reply))
								{
									if($row_reply[0]==$row[0])
									{
              	   echo "<br/>我是回應:~~~~~~" . 
             	    " 作者：$row_reply[1], 時間：$row_reply[2] ~~~~~~".
									" 內容：$row_reply[3]";
									
									
										if(@$_SESSION['username'] == $row_reply[1])
										{
												$temp1=$row_reply[4]; //傳流水號
												echo "<a href=\"replyupdate.php?A=".$temp1."\"> 編輯回應 </a>";
												$temp2=$row_reply[4];
												echo "<a href=\"deletereply.php?A=".$temp2."\"> 刪除回應 </a>";
										}
										
										
									}
								}
								$temp0=$row[0];
								echo "<a href=\"reply.php?A=".$temp0."\"><br/>回應 </a>";
								
								
					if(@$_SESSION['username'] == $row[1])
					{
							$temp1=$row[0];
							echo "<a href=\"postupdate.php?A=".$temp1."\"> 編輯貼文 </a>";
							$temp2=$row[0];
							echo "<a href=\"deletepost.php?A=".$temp2."\"> 刪除貼文 </a><br/>";
					}
					else 
						echo "<br/>";
        }

?>


<hr/> <!我是水平線>

<div id="head-links">
<h6>常用連結</h6>
<ul>
		<li><a href="http://www.cc.ncu.edu.tw/" target="_blank">國立中央大學電子計算機中心</a>
				<a href="http://portal.ncu.edu.tw/" target="_blank">中大Portal</a>
				<a href="http://lms.ncu.edu.tw/" target="_blank">LMS</a></li>
		<li><a href="https://tw.dictionary.yahoo.com" target="_blank">Yahoo!字典</a>
				<a href="https://www.facebook.com/" target="_blank">Facebook</a>
				<a href="https://www.youtube.com/" target="_blank">YouTube</a>
				<a href="http://google.com" target="_blank">Google</a></li>
</ul>
</div>


<hr/> <!我是水平線>

<div id="footer">
<small> <!變小>
       <copyright>
					王辰旭 版權所有 Copyright © 2014<br/>
        	地址：國立中央大學男11舍204-2<br/>
				  手機：0918570587<br/>
			 </copyright>
</small>
</div>


</div>
</body>

</html>