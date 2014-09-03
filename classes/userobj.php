<?php
Class userObj{
	var $dbConnect;
	var $userId;
	var $is_admin;
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
	var $securityquest1;
	var $securityans1;
	var $securityquest2;
	var $securityans2;
	var $unverifiedFlag;
	var $agreed_to_TOS;
	

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
				securityans1,
				securityquest2,
				securityans2,
				unverifiedFlag,
				agreed_to_TOS
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
			$this->agreed_to_TOS = $resultSet[0]['agreed_to_TOS'];
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
			$this->agreed_to_TOS = '';
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


public static function insertUser(&$dbObj,$userFullName="",$userEmail,$userUsername="",$userPassword,$userUnverifiedFlag=1,$is_admin=0,$timezone='EST',$loggedIp='0.0.0.0',$is_locked=0,$securityquest1,$securityans1,$securityquest2,$securityans2,$agreed_to_TOS=0)
	{
$user='root';
$pass='Maddy.7800!!!!';
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
				date_time,
				is_admin,
				timezone,
				logged_ip,
				is_locked,
				securityquest1,
				securityans1,
				securityquest2,
				securityans2,
				agreed_to_TOS
			)
		VALUES 
			(
				:userFullName,
				:userEmail,
				:userUsername,
				:userPassword,
				:userUnverifiedFlag,
				NOW(),
				$is_admin,
				:timezone,
				:loggedIp,
				$is_locked,
				$securityquest1,
				:securityans1,
				$securityquest2,
				:securityans2,
				$agreed_to_TOS
			) 
			";//echo $strQuery;//exit;
		//$connection = new dbObj($newName='exchange',$newHost='localhost',$newUser='root',$newPassword='Maddy.7800!!!!');
$connection = new PDO('mysql:host=localhost;dbname=exchange', $user, $pass);
		//try{
		//$stmt = $connection->dbConnect->prepare($strQuery);
		//}
		//catch(PDOException $e){
		    //echo 'PDO Error!: '.$e->getMessage();
		    //exit();
		//}
$stmt = $connection->prepare($strQuery);
		$stmt->bindValue(':userFullName', $userFullName);
		$stmt->bindValue(':userEmail', $userEmail);
		$stmt->bindValue(':userUsername', $userUsername);
		$stmt->bindValue(':userPassword', $userPassword);
		$stmt->bindValue(':userUnverifiedFlag', $userUnverifiedFlag);
		$stmt->bindValue(':timezone', $timezone);
		$stmt->bindValue(':loggedIp', $loggedIp);
		$stmt->bindValue(':securityans1', $securityans1);
		$stmt->bindValue(':securityans2', $securityans2);
//$stmt->debugDumpParams();
		try{
		$stmt->execute();
		}
		catch(PDOException $e){
		    echo 'PDO Error!: '.$e->getMessage();
		    exit();
		}
//print_r($stmt);

		$resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
echo "hello";
//print_r($resultSet);
		return $resultSet;
	}
public static function insertUser2(&$dbObj,$email,$password,$securityquest1,$securityans1,$securityquest2,$securityans2)
	{
$crypt_password=crypt($password);
$unverifiedFlag=1;
$is_admin=0;
$timezone='EST';
$logged_ip='0.0.0.0';
$is_locked=0;
		$dbConnect = &$dbObj;		
		$strQuery = "
			INSERT INTO 
				tbluser
			(
				email,
				password,
				unverifiedFlag,
				date_time,
				is_admin,
				timezone,
				logged_ip,
				is_locked,
				securityquest1,
				securityans1,
				securityquest2,
				securityans2
			)
		VALUES 
			(
				:email,
				:password,
				$unverifiedFlag,
				NOW(),
				$is_admin,
				:timezone,
				:logged_ip,
				$is_locked,
				:securityquest1,
				:securityans1,
				:securityquest2,
				:securityans2
			) 
			";//echo $strQuery;//exit;
		$connection = new dbObj();
		try{
		$stmt = $connection->dbConnect->prepare($strQuery);
		}
		catch(PDOException $e){
		    echo 'PDO Error!: '.$e->getMessage();
		    exit();
		}

		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':password', $crypt_password);
		$stmt->bindValue(':timezone', $timezone);
		$stmt->bindValue(':logged_ip', $logged_ip);
		$stmt->bindValue(':securityquest1', $securityquest1);
		$stmt->bindValue(':securityans1', $securityans1);
		$stmt->bindValue(':securityquest2', $securityquest2);
		$stmt->bindValue(':securityans2', $securityans2);
		try{
		$stmt->execute();
		}
		catch(PDOException $e){
		    echo 'PDO Error!: '.$e->getMessage();
		    exit();
		}

		$resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Thank you for registering!";
		return $resultSet;
	}
}
?>
