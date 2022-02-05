<?php  
	include 'dbconnection.php';
	$uname = $_GET['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	<script src="js/jquery.js"></script>
	<script>window.history.pushState("profile", "Profile", "profile.php?user=<?=$_GET['user']?>");</script>
	<?php include_once 'navbarHead.php' ?>
	<script>
		var form = new FormData();
		form.append("query", "SELECT * FROM posts WHERE user='<?=$uname?>' ORDER BY date DESC");
		$(document).ready(function(){
			$.post('loadProfile.php', {uname: "<?=$uname?>"},
				function(data){
					$('.content').empty().prepend(data);
					$('body').prepend($('.editpopupBox'));
				});
			$.ajax({
				url: 'loadPosts.php',
				method: 'POST',
				data: form,
				contentType: false,
				processData: false,
				cache: false,
				success: function(data){
					$('.content').append(data);
				}
			});
		});
	</script>
</head>
<body style="background-image: linear-gradient(90deg, #a24cc2,#2e3fd9)">
	<div id="hh" class="home headerText"><h3>Profile</h3></div>
	<!-- HIDDEN DIV -->
	<div class="posts">
	<?php $query = "SELECT * FROM posts ORDER BY date DESC"; ?>
	<?php
		//TO MAKE SURE THE STYLE IS APPLIED FIRST
		echo "<script src='https://kit.fontawesome.com/feb0efc128.js' crossorigin='anonymous'></script>";
		echo "<link rel='stylesheet' href='css/home.css'>";
	?>
	</div>
</body>
</html>