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
	var $unverifiedFlag;
	

	public function __construct(&$dbObj,$userId){
		$this->dbConnect = &$dbObject;
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
				securityquest2,
				unverifiedFlag
			FROM 
				tbluser
			WHERE
				id = :id
			LIMIT 1
			";
		#getData database.php
		
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
			$this->unverifiedFlag = $resultSet[0]['unverifiedFlag'];
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
			$this->unverifiedFlag = '';
		}//echo $this->username;		
	}
	public static function userEmailExists( $dbObj,$email )
	{
		$dbConnect = $dbObject;
		$strQuery = "
			SELECT 
				id
			FROM 
				tbluser
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


public static function insertUser(&$dbObj,$userFullName,$userEmail,$userUsername,$userPassword,$userUnverifiedFlag)
	{
		$dbConnect = &$dbObj;		
		$strQuery = "
			INSERT INTO 
				tbluser
			(
				full_name,

				email,
				username,
				password,
				unverifiedFlag,
				date_time
			)
		VALUES 
			(
				:userFullName,
				:userEmail,
				:userUsername,
				:userPassword,
				:userUnverifiedFlag,
				NOW()
			) 
			";//echo $strQuery;exit;
		$connection = new dbObj($newName='exchange',$newHost='localhost',$newUser='root',$newPassword='Maddy.7800!!!!');
		$stmt = $connection->dbConnect->prepare($strQuery);
		$stmt->bindValue(':userFullName', $userFullName, PDO::PARAM_INT);
		$stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_INT);
		$stmt->bindValue(':userUsername', $userUsername, PDO::PARAM_INT);
		$stmt->bindValue(':userPassword', $userPassword, PDO::PARAM_INT);
		$stmt->bindValue(':userUnverifiedFlag', $userUnverifiedFlag, PDO::PARAM_INT);
		//$stmt->bindValue(':userDateTime', $userDateTime, PDO::PARAM_INT);
		$stmt->execute();
		$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $resultSet;
	}

}
?>
