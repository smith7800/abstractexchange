<?php
Class dbObj{
	var $dbName;
	var $dbHostlocalhost;
	var $dbUser;
	var $dbPassword;
	var $dbConnect;
	var $dbResultSet;
	public function dbObj($newName='exchange',$newHost='localhost',$newUser='root',$newPassword='Maddy.7800!!!!'){
		$this->dbName=$newName;
		$this->dbHost=$newHost;
		$this->dbUser=$newUser;
		$this->dbPassword=$newPassword;
		$this->dbConnection();
	}
	function dbConnection(){
		//$this->dbConnect = new PDO('mysql:host='.$this->dbHost.';dbname='.$this->dbName.';charset=utf8', $this->dbUser, $this->dbPassword);
		try{
		    $this->dbConnect=new PDO('mysql:host='.$this->dbHost.';dbname='.$this->dbName.';charset=utf8', $this->dbUser, $this->dbPassword);
		} 
		catch(PDOException $e){
		    echo 'Error connecting to MySQL!: '.$e->getMessage();
		    exit();
		}
	}
	function dbCloseConnection(){	
		$this->dbConnect = null;
	}
	function dbRowCount(){
		$stmt = $this->dbConnect->query('SELECT * FROM user');
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $stmt->rowCount();
	}
	function dbColCount(){
		$this->dbColCount=mysql_num_fields($this->dbResultSet);
		return $this->dbColCount;
	}
	function dbFetchRow(){
		return mysql_fetch_row($this->dbResultSet);
	}
	function dbSelect( $newQuery )
	{
		$this->dbQueryArray[] = $newQuery;
		if ( $this->dbConnect == NULL )
		{
			$this->dbConnection();
		}
		
		$this->dbResultSet = mysql_query($newQuery);			
		$this->dbResultArray = array();

		for($i = 0;$i < $this->dbRowCount();$i++)
		{ 
			$temp = $this->dbFetchRow();
			for ( $j = 0; $j < $this->dbColCount(); $j++)
			{
				$this->dbResultArray[$i][$j] = $temp[$j];
			}
		}
		return $this->dbResultArray;
	} 
	
	//Update Rows
	function dbUpdate($newQuery)
	{
		$this->dbQueryArray[] = $newQuery;
		$this->dbResultSet = mysql_query($newQuery);			
	}
	
	//Insert Row
	function dbInsert($newQuery)
	{
		$this->dbQueryArray[] = $newQuery;
		$this->dbResultSet = mysql_query($newQuery);
		$this->dbInsertID = mysql_insert_id();			
		return $this->dbInsertID;
	}	
	
	function dbDelete($newQuery)
	{
		$this->dbQueryArray[] = $newQuery;
		$this->dbResultSet = mysql_query($newQuery);			
	}
}
?>
