<?php

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<title>Premium Coin Exchange</title>
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
<select>
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
<div><input type="security" name="security1" id="password2"></div>
<div>Security Question 2:</div>
<div>
<select>
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
<div><input type="security" name="security2" id="password2"></div>
<div><button type=submit>Register</button></div>
</form>
</div>
<div id="footer">
footer
</div>
</body>
</html>
