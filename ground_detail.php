

<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />

<?php
	
	
	
	header("Content-Type: text/html; charset=gb2312");
	$activity_id  = trim($_GET['activity_id']);
	$user_id = trim($_GET['user_id']);
	echo "hello world�ҵ�</br>";
	echo $activity_id;
	echo $user_id;
	@ $db = new mysqli('localhost', 'root','123','mutu');
	if(mysqli_connect_errno()){
		echo'Error: we could not connect to the database, please try again later.';
		exit;
	}
	
	$query = "select * from activity where activity_id = '".$activity_id."'";
	
	
	$details = mysqli_query($db,$query);
	$num_details = mysqli_num_rows($details);
	
	if($num_details > 1){
		echo "there are more than one details here, please check it again </br>";
		echo "<p>number of user found: ".$num_results."</p>";
		exit;
	}
	
	
//��ʾ���ϸ��Ϣ
		$row = mysqli_fetch_assoc($details);
		echo "<table><div id= \"table\">";
		echo "�id";
		echo htmlspecialchars(stripslashes($row['activity_id']));
		echo "<br />�����: </strong>";
		echo stripslashes($row['activity_name']);
		echo "<strong><br />�������: </strong>";
		echo stripslashes($row['activity_organizer']);
		echo "<strong><br />����: </strong>";
		echo stripslashes($row['activity_describe']);
		echo "<strong><br />��ע: </strong>";
		echo stripslashes($row['activity_remark']);
		echo "<strong><br />�������: </strong>";
		echo stripslashes($row['activity_num_total']);
		echo "<strong><br />���ڻ����: </strong>";
		echo stripslashes($row['activity_num_now']);
		echo "<strong><br />�ͷ��: </strong>";
		echo"<div id=\"localImag\"><img id=\"preview\" src = ".stripslashes($row['activity_picture'])." width=40 height=40 style=\"diplay:none\" /></div>";
		echo "</div></table>";
		echo "</p>";
		echo "<br />";
		echo"<a href=\"time.php\">��������</a>";
		echo "<a href=ground.php?userid=".$user_id.">����</a>";

?>

