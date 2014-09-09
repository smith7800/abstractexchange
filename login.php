<?php


?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<title>Premium Coin Exchange</title>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'loginpost.php',
            data: $('form').serialize(),
            success: function (html) {
              alert('form was submitted');
		if(html=='true'){
			window.location="dashboard.php";
		}
		else{
			window.location="/";
		}
		
            }
          });

        });

      });
    </script>
	</head>
	<body>
		<div id="header">
		header
		</div>
		<div id="content">
			<form id="login" action="loginpost.php" method="post" autocomplete="on">
				<div>E-mail: <input type="email" name="email"></div>
				<div>Password: <input type="password" name="password" id="password"></div>
				<div><button type=submit>Register</button></div>
			</form>
		</div>
		<div id="footer">
			footer
		</div>
	</body>
</html>
