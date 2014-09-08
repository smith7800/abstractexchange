<?php
require_once('../systemincludes.php');
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
            url: 'registerpost.php',
            data: $('form').serialize(),
            success: function (html) {
              alert('form was submitted');
		if(html=='true'){
			window.location="su.php";
		}
		else if(html=='emailexists'){
			window.location="emailexists.php";
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
<form id="register" action="registerpost.php" method="post" autocomplete="on">
<div>E-mail: <input type="email" name="email"></div>
<div>Password: <input type="password" name="password" id="password"></div>
<div>Password: <input type="password" name="password2" id="password2"></div>
<div>Security Question 1:</div>
<div>
<select id="quest1" name="quest1">
  <option value="band">What is the name of your favorite band?</option>
  <option value="other">What city did you meet your significant other?</option>
  <option value="visit">What city would you most like to visit?</option>
  <option value="coin">What coin did you first mine?</option>
  <option value="celebrity">What celebrity do you most resemble?</option>
  <option value="song">What is the name of your all-time favorite song?</option>
  <option value="beverage">What is your favorite beverage?</option>
  <option value="cartoon">What is the name of your favorite cartoon?</option>
</select>
</div>
<div><input type="text" name="answer1" id="answer1"></div>
<div>Security Question 2:</div>
<div>
<select id="quest2" name="quest2">
  <option value="animal">What is your favorite animal?</option>
  <option value="father">What city was your father born?</option>
  <option value="food">What is your favorite food?</option>
  <option value="film">What is your favorite film?</option>
  <option value="lucky">What is your lucky number?</option>
  <option value="planet">Which planet is your favorite?</option>
  <option value="fish">What kind of fish is your favorite?</option>
  <option value="water">Which body of water is your favorite?</option>
</select>
</div>
<div><input type="text" name="answer2" id="answer2"></div>
<div><button type=submit>Register</button></div>
</form>
</div>
<div id="footer">
footer
</div>
</body>
</html>
