<!DOCTYPE html>
<html>
<head>
<meta name="viewpoint" content="width=deviece-width, initial-scale=1， charset=utf-8">
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h4 class='jumbotron'>选择您想要的时间，然后点击提交<br></h4>
</div>
<div class="container">
    <form role="form" id="timecheck" action="/after_join.php" method="post">
<?php
	    $_SESSION["uid"]=1;
	    $_SESSION["act_id"]=1;
	    $servername="localhost";
	    $username="root";
	    $pswd="";
	    $dbname="mutu";
	    $cursor=mysqli_connect($servername,$username,$pswd,$dbname);
	    /*ID of activity and user transfered by POST*/
	    //$UID=$_POST["userID"];
	    //$actID=$_POST["actID"];
	    $UID=$_SESSION["uid"];
	    $actID=$_SESSION["act_id"];
	    $result=mysqli_query($cursor,"select time_id,time from act_time_table where act_id=$actID");
	    echo "welcome $UID <br>";
	    while ($row=mysqli_fetch_array($result))
	    {
		echo '<div class="form-group">';
		echo "<label class='form-control input-lg-12 col-lg-12'><input type ='checkbox' name=",$row["time_id"]," value=",$row["time_id"],">";
		echo $row["time"];
		echo "</label>\n";
		echo "</div>\n";
	    }
?>
    <div class='form-group'><input class='btn btn-lg' type="submit" value="提交" name="submit"></div>
    </form>
</div>

</body>
</html>
