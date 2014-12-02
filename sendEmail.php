<?php
//session_start();
header("charset=utf8");
//verion 1-1 by rose on 1st,Dec.2014
require_once('sendEmail.class.php');

if((isset($_POST["send"]))&&($_POST["send"]=="form1"))
{
$sendto="122955739@qq.com";
$sendfrom="jolie_yang@163.com";
$mailpass="roseinwangyi";
$mailserver="smtp.163.com";
$subject="CDIO联合技术组问题";
$message0=$_POST['respondClass'];
$message1=$_POST['respondGroup'];
$message2=$_POST['respondName'];
$message3=$_POST['respondTel'];
$message4=$_POST['respondQq'];
$message5=$_POST['respondProblem'];
$message6=$_POST['respondProgress'];
$message="班级:".$message0."组别:".$message1." 姓名 ".$message2." 电话 ".$message3." QQ ".$message4."\n"."问题:"."\n".$message5."\n"."进展:"."\n".$message6;
$sm = new smail( $sendfrom, $mailpass, $mailserver);
$end = $sm->send( $sendto, $sendfrom, $subject, $message );
if( $end ) echo $end;
else echo "<script>alert('发送成功');</script>";
}
?>
<html>
<!-- rose on 1st,Dec,2014 respondTable version1.1 -->
<head>
	<meta charset="utf-8">

	<title></title>

	<!-- 包含头部信息用于适应不同设备 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<!--
	<script src="jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#SendEmail").click(function() {
			if (($("#respondName").html() == "") || ($("#respondTel").html() == "") || ($("#respondProblem").html() == "") || ($("#respondProgress").html() =="") {
				alert("Please enter need info");
			}
			alert("oh,no");
		});
	});
	</script>
-->
	<script src="jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#SendEmail").click(function() {
			//alert($("#respondProblem").html());
			//alert($("#respondTel").val());
			if ($("#respondName").html() == "") {
				$("#hid_btton").val("");
				$("#respondName").focus();
			}
			else if($("#respondTel").html() == "") {
				$("#hid_btton").val("");
				$("#respondTel").focus();
			}
			else if ($("#respondProblem").html() == "") {
				$("#respondProblem").focus();
			}
			else if ($("#respondProgress").html() == "") {
				$("#respondProgress").focus();
			}
			else {
				$("#hid_btton").val("form1");
			}
/*
			if(($("#respondName").html()=="") || ($("#respondTel").html() == "") || ($("#respondProblem") == "") || ($("#respondProgress") == "")) {
				alert("oh,no");
			}
*/			
		});
	});
	</script>
</head>

<body>
	<div class="container">
		<form method="post" name="form1" action="" id="form1">
		<div class="table-responsive">  
			<table class="table table-striped">
				<thead>
					<tr id="tTitle">
						<th colspan="4"><h1 class="text-center">CDIO联合技术组问题表 Beta1.1</h1></th>
					</tr>
				</thead>
				<tbody>
				<tr id="tInfo">
					<td>
						<div class="input-group">
							<span class="input-group-addon">Java</span> 
							<select class="form-control" name="respondClass"><option disabled selected>请选择</option><option>1</option><option>2</option></select><span class="input-group-addon">班</span>
							<select class="form-control" name="respondGroup">
								<option selected disabled>请选择</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select><span class="input-group-addon">组</span>
						</div>
					</td>
					<td>
						<div class="input-group">
							<span class="input-group-addon">姓名</span><input type="text" class="form-control" placeholder="必填" name="respondName"id="respondName">
						</div>
					</td>
					<td>
						<div class="input-group">
							<span class="input-group-addon">手机</span><input type="tel" class="form-control" placeholder="必填" name="respondTel"id="respondTel">
						</div>
					</td>
					<td>
						<div class="input-group">
							<span class="input-group-addon">qq</span><input type="tel" class="form-control"name="respondQq" id="respondQq">
						</div>
					</td>
				</tr>
				<tr id="tProblem">
					<td>问题</td>
					<td colspan="3">
						<textarea style="height: 170px;"name="respondProblem" id="respondProblem"class="form-control"></textarea>
					</td>	
				</tr>
				<tr id="tProgre">
					<td>自己尝试解决的进展</td>
					<td colspan="3">
						<textarea style="height: 170px;"name="respondProgress" id="respondProgress" class="form-control" placeholder="这里写下你尝试解决这个问题时所获得的进展。就算无任何进展，也请粘贴上你百度到的一些有用的信息。百度搜索的链接不算"></textarea>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<div class="text-right">
			<input type="reset" value="Reset" class="btn btn-default">
			<input type="submit" value="发送邮件" class="btn btn-default" id="SendEmail">
		</div>
	<input type="hidden" name="send" value="form1" id="hid_btton"/>
	</form>
	<div id ="footer" style="border-top: dashed 1px lightgray;">
		<div class="site_about">
			<p style="color: gray">2014 by JolieYang  </p>
		</div>
	</div>
	</div>
</body>
</html>