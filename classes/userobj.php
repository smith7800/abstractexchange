<?php
Class userObj{
	var $dbConnect;
	var $userId;
	var $isAdmin;
	var $username;
	var $password;
	var $email;
	var $timezone;
	var $loggedIp;
	var $isLocked;
	var $failedLogins;
	var $signupTimestamp;
	var $lastLogin;
	var $fullName;
	var $securityQuestion1;
	var $securityQuestion2;
	

	public function userObj(&$dbObj,$uid){
		$this->userItemArray = array();
		$strQuery = "
			SELECT 
				id,
				is_admin,
				username,
				password,
				email,
				timezone,
				loggedIp,
				is_locked,
				failed_logins,
				last_login,
				full_name,
				securityquest1,
				securityquest2
			FROM 
				user
			WHERE
				id = :id
			LIMIT 1
			";
		#getData database.php
		$db = new PDO('mysql:host=localhost;dbname=exchange;charset=utf8', 'root', 'Maddy.7800!!!!');
		$stmt = $db->prepare($strQuery);
		$stmt->bindValue(':id', $uid, PDO::PARAM_INT);
		$stmt->execute();
		$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($resultSet);
		if (count($resultSet))
		{
			$this->userID = $resultSet[0]['userId'];
			$this->isAdmin = $resultSet[0]['isAdmin'];
			$this->username = $resultSet[0]['username'];
			$this->password = $resultSet[0]['password'];
			$this->email = $resultSet[0]['email'];
			$this->timezone = $resultSet[0]['timezone'];
			$this->loggedIp = $resultSet[0]['loggedIp'];
			$this->isLocked = $resultSet[0]['isLocked'];
			$this->failedLogins = $resultSet[0]['failedLogins'];
			$this->signupTimestamp = $resultSet[0]['signupTimestamp'];
			$this->lastLogin = $resultSet[0]['lastLogin'];
			$this->fullName = $resultSet[0]['fullName'];
			$this->securityquest1 = $resultSet[0]['securityQuestion1'];
			$this->securityquest2 = $resultSet[0]['securityQuestion2'];
		}
		else
		{
                        $this->userID = '';
                        $this->isAdmin ='';
                        $this->username = '';
                        $this->password = '';
                        $this->email = '';
                        $this->timezone = '';
                        $this->loggedIp = '';
                        $this->isLocked = '';
                        $this->failedLogins =''; 
			$this->signupTimestamp = '';
                        $this->lastLogin = '';
                        $this->fullName = '';
                        $this->securityquest1 = '';
                        $this->securityquest2 = '';
		}//echo $this->username;		
	}
	public static function userEmailExists( $dbObj,$email )
	{
		$dbConnect = $dbObject;
		$strQuery = "
			SELECT 
				id
			FROM 
				user
			WHERE 
				email = :email 
			ORDER BY 
				id
			LIMIT 1
			";
	#getData database.php

	//$db = new PDO('mysql:host=localhost;dbname=exchange;charset=utf8', 'root', 'Maddy.7800!!!!');
	
	$stmt = $dbConnect->prepare($strQuery);
	$stmt->bindValue(':email', $email, PDO::PARAM_INT);
	$stmt->execute();
	$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($resultSet);
	//$dbConnect = &$dbObject;
	//$resultSet = $dbConnect->dbSelect( $strQuery );
	print_r($resultSet);
	$tempInt = $resultSet[0]['id'];
echo "tempint: ".$resultSet;
	if ( $tempInt )
		return 1;
	else
	return 0;
}

public static insertUser(&$dbObject,$userFirstName,$userLastName,$userEmail,$userUsername,$userPassword,$userUnverifiedFlag=1){
		
	}
}
?>
