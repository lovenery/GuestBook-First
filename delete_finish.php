<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$id = $_POST['id'];

if($_SESSION['username'] != null)
{
        //�R����Ʈw��ƻy�k
        $sql = "delete from member_table where username='$id'";
        if(mysql_query($sql))
        {
                echo '�R�����\!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
        }
        else
        {
                echo '�R������!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
        }
}
else
{
        echo '�z�L�v���[�ݦ�����!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>