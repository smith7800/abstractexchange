<?php
Class userObj{
	var $dbConnect;
	var $id;
	var $is_admin;
	var $username;
	var $password;
	var $email;
	var $timezone;
	var $logged_ip;
	var $ip_forwarded;
	var $is_locked;
	var $failed_logins;
	var $date_time;
	var $last_login;
	var $full_name;
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
				logged_ip,
				ip_forwarded,
				is_locked,
				failed_logins,
				date_time,
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
			$this->userID = $resultSet[0]['id'];
			$this->is_admin = $resultSet[0]['is_admin'];
			$this->username = $resultSet[0]['username'];
			$this->password = $resultSet[0]['password'];
			$this->email = $resultSet[0]['email'];
			$this->timezone = $resultSet[0]['timezone'];
			$this->logged_ip = $resultSet[0]['logged_ip'];
			$this->ip_forwarded = $resultSet[0]['ip_forwarded'];
			$this->is_locked = $resultSet[0]['is_locked'];
			$this->failed_logins = $resultSet[0]['failed_logins'];
			$this->date_time = $resultSet[0]['date_time'];
			$this->last_login = $resultSet[0]['last_login'];
			$this->full_name = $resultSet[0]['full_name'];
			$this->securityquest1 = $resultSet[0]['securityquest1'];
			$this->securityquest1 = $resultSet[0]['securityans1'];
			$this->securityquest1 = $resultSet[0]['securityquest2'];
			$this->securityquest2 = $resultSet[0]['securityans2'];
			$this->unverifiedFlag = $resultSet[0]['unverifiedFlag'];
			$this->agreed_to_TOS = $resultSet[0]['agreed_to_TOS'];
		}
		else
		{
                        $this->id = '';
                        $this->is_admin ='';
                        $this->username = '';
                        $this->password = '';
                        $this->email = '';
                        $this->timezone = '';
                        $this->logged_ip = '';
                        $this->ip_forwarded = '';
                        $this->is_locked = '';
                        $this->failed_logins =''; 
			$this->date_time = '';
                        $this->last_login = '';
                        $this->full_name = '';
                        $this->securityquest1 = '';
                        $this->securityquest2 = '';
			$this->unverifiedFlag = '';
			$this->agreed_to_TOS = '';
		}//echo $this->username;		
	}

public static function insertUser(&$dbObj,$email,$password,$logged_ip,$ip_forwarded,$securityquest1,$securityans1,$securityquest2,$securityans2)
	{
$salt = getenv('WEBSITE_SALT');
$crypt_password=crypt($password,$salt);
$unverifiedFlag=1;
$is_admin=0;
$timezone='EST';
$is_locked=0;
		$dbConnects = &$dbObj;		
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
				ip_forwarded,
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
				:ip_forwarded,
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
		$stmt->bindValue(':ip_forwarded', $logged_ip);
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
		return $resultSet;
	}

	public static function customerVerifyLogin( &$dbObject, $email, $password )
	{
		$salt = getenv('WEBSITE_SALT');
		$crypt_password=crypt($password,$salt);
		$dbConnect = &$dbObject;
		$strQuery = "
			SELECT 
				id
			FROM 
				tbluser
			WHERE 
				email = :email AND
				password = :password AND
				unverifiedFlag = '1'
			ORDER BY 
				id
			LIMIT 1
			";
		$connection = new dbObj();
		$stmt = $connection->dbConnect->prepare($strQuery);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':password', $crypt_password);
		try{
		$stmt->execute();
		}
		catch(PDOException $e){
		    echo 'PDO Error!: '.$e->getMessage();
		    exit();
		}

		$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$tempInt = $resultSet[0];
		if ( $tempInt )
			return $tempInt;
		return 0;
	}

	public static function emailExists( &$dbObject, $email )
	{
		$dbConnect = &$dbObject;
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
		$connection = new dbObj();
		$stmt = $connection->dbConnect->prepare($strQuery);
		$stmt->bindValue(':email', $email);
		try{
		$stmt->execute();
		}
		catch(PDOException $e){
		    echo 'PDO Error!: '.$e->getMessage();
		    exit();
		}

		$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if($resultSet){
		$tempInt = $resultSet[0];
		}
		else{
		$tempInt=0;
		}
		if ( $tempInt )
			return $tempInt;
		return 0;
	}
}
?>
