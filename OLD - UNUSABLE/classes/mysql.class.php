<?php
//require('bootstrap.class.php');
class DB_Store
{
    private $_configuration;
    private $_storage;
    
    public function __construct($bootstrap)
    {
        $this->_configuration = $bootstrap->getConfiguration();
        $this->_startDB();
    }
    
    public function createNewInstance($db,$caller,$number = 1)
    {
        $dbString = $db."_Database";
        $loginDetails = array("host" => $this->_configuration->getOption("dbHost"), "username" => $this->_configuration->getOption("dbUser"),"password" => $this->_configuration->getOption("dbPass"));
        if($db == "Character")
        {
            $id = $number - 1;
            $loginDetails[$db] = $this->_configuration->getDBName("Character",$i);
        }else{
            $loginDetails[$db] = $this->_configuration->getDBName($db);
        }
        return $this->_registerDB(new $dbString($loginDetails),$caller);
    }
    
    public function getInstance($db = "",$uid = 0,$caller = "global") 
    {
        foreach($this->_storage as $UID => $instance)
        {
            if($caller == "global" && $caller == $instance[1])
            {
                return $instance[0];
            }elseif($UID == $uid && $caller == $instance[1]){
                return $instance[0];
            }
        }
        return FALSE;
    }
    
    private function _startDB()
    {
        for($i = 0; $i < $this->_configuration->getCountCharsDB() + 2;$i++)
        {
            $loginDetails = array("host" => $this->_configuration->getOption("dbHost"), "username" => $this->_configuration->getOption("dbUser"),"password" => $this->_configuration->getOption("dbPass"));
            if($i == 0){
                $loginDetails["World"] = $this->_configuration->getDBName("World");
                $this->_registerDB(new World_Database($loginDetails)); 
            }elseif($i == 1){
                $loginDetails["Realm"] = $this->_configuration->getDBName("Realm");
                $this->_registerDB(new Realm_Database($loginDetails));
            }elseif($i == 2){
                $tmp = $this->_configuration->getDBName("Character");
                $loginDetails["Character"] = $tmp[$i-2];
                $this->_registerDB(new Character_Database($loginDetails));
            }
            unset($loginDetails);
        }
    }
    
    private function _checkUID($UID)
    {
        if(isset($this->_storage[$UID]))
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    private function _registerDB($instance,$caller = "global")
    {
        do{
            $UID = rand(1,65535);
        }while($this->_checkUID($UID));
        $this->_storage[$UID] = array($instance,$caller);
        if($caller != "global"){
            return $UID;
        }
    }
}

abstract class MySQL
{
	protected $_Instance;
	
	public function getInstance()
	{
		return $this->_Instance;
	}
	
	public function setInstance($instance)
	{
		$this->_Instance = $instance;
		return $this;
	}
	
	public function makeArgumentsSafe($arguments)
	{
		if(is_array($arguments))
		{
			$result = array();
			foreach($arguments as $argument)
			{
				$result[] = $this->getInstance()->quote($argument); 
			}
		}else{
			$result = $this->getInstance()->quote($arguments);
		}
		return $result;
	}
	
	public function prepareStatement($sql,$arguments)
	{
		$stmn = $this->getInstance()->prepare($sql);
		if(is_array($arguments))
		{			
			for($i = 0; $i < count($arguments);$i++)
			{
				$stmn->bindValue($i+1,$arguments[$i]);
			}
		}else{
			$stmn->bindValue(1,$arguments);
		}
		return $stmn;
	}
	
	public function runQuery($sql)
	{
		try{
			$this->getInstance()->beginTransaction()
								->exec($sql)
								->commit();
		}
		catch(PDOException $error)
		{
			$this->getInstance()->rollback();
			return $error->getCode();
		}
		
	}
	
	public function fetchResult($result)
	{
		if(is_object($result)){
			if(1 < $result->rowCount())
			{
				return $result->fetchAll();
			}else{
				return $result->fetch(PDO::FETCH_LAZY);			
			}
		}else{
			var_dump($result);
		}
	}
	
}

class Realm_Database extends MySQL
{
	
	public function __construct($details)
	{
		$dbIdentifier = explode('_',get_class());
		$this->setInstance(new PDO("mysql:host=".$details['host'].";dbname=".$details[$dbIdentifier[0]], $details['username'], $details['password']));
	}
	
	public function __destruct()
	{
		$this->setInstance(NULL);
	}
	
	private function _generatePassword($username,$password)
	{
		return SHA1(mysql_real_escape_string($username).":".mysql_real_escape_string($password));
	}
	
	public function authorize($username,$password)
	{
		$result = $this->getInstance()->prepareStatement("SELECT id FROM `account` WHERE username='?' AND sha_pass_hash='?';",array($username,$this->_generatePassword($username,$password)));
		if($result->rowCount() <= 0){
			return FALSE;
		}else if($result->rowCount() == 1)
		{
			return $result->fetch(PDO::FETCH_OBJ)->id;
		}
	}
	
	public function registerAccount($username,$password,$email)
	{
		$registerDetails = $this->makeArgumentsSafe(array($username,$password,$email));
		if($this->runQuery("INSERT INTO `account` (username,sha_pass_hash,email) VALUES ('".$registerDetails[0]."','".$registerDetails[1]."','".$registerDetails[2]."');"))
		{
			return TRUE;
		}
	}
}

class Character_Database extends MySQL
{
	
	public function __construct($details)
	{
		$dbIdentifier = explode('_',get_class());
		$this->setInstance(new PDO("mysql:host=".$details['host'].";dbname=".$details[$dbIdentifier[0]], $details['username'], $details['password']));
	}
	
	public function __destruct()
	{
		$this->setInstance(NULL);
	}
	
	public function getGuidByName($name)
	{
		$arg = $this->makeArgumentsSafe($name);
		$result = $this->getInstance()->query("SELECT guid FROM `characters` WHERE name=".$arg);
		if($result){
			return $this->fetchResult($result)->guid;
		}
	}
	
	public function getEquipedItems($Guid)
	{
		$itemsRaw = $this->fetchResult($this->getInstance()->query("SELECT itemEntry,slot FROM `item_instance` INNER JOIN `character_inventory` ON `character_inventory`.`item`=`item_instance`.`guid` WHERE owner_guid=".$this->makeArgumentsSafe($Guid)." AND slot <= 18 AND bag = 0 ORDER BY slot"));
        $items = array();
        foreach($itemsRaw as $item)
        {
            if(!in_array($item["itemEntry"],$itemsRaw))
            {
                $items[$item["slot"]] = $item;
            }
        }
        $result = array();
        for($i = 0; $i <= 18;$i++)
        {
            if(isset($items[$i]))
            {
                $result[$items[$i]["slot"]] = $items[$i];
            }else{
                $result[$i] = NULL;
            }
        }
        return $result;
	}
	
	public function getInfoFor($Guid)
	{
		$character = $this->prepareStatement("SELECT name,race,class,gender,level,health,power1,power2,power4,power5,power6,power7 FROM `characters` WHERE guid=?",$Guid);
		$character->execute();
		return $this->fetchResult($character);
	}
    
    public function getStats($Guid)
    {
        $stats = $this->prepareStatement("SELECT * FROM `character_stats` WHERE guid=?",$Guid);
        $stats->execute();
        return $this->fetchResult($stats);
    }
    
    public function getTalents($Guid)
    {
        $talents0= $this->prepareStatement("SELECT branchSpec as branchP FROM `character_branchspec` WHERE spec = 0 AND guid=?",$Guid);
        $talents1= $this->prepareStatement("SELECT branchSpec as branchS FROM `character_branchspec` WHERE spec = 1 AND guid=?",$Guid);
        $talents0->execute();
        $talents1->execute();
        //$talents = $this->prepareStatement("SELECT branchSpec FROM `character_branchspec` WHERE guid=?",$Guid);
        //$talents = $this->execute();
        //$talents = $talents0 + $talents1;
        return $this->fetchResult($talents0,$talents1);
    }
}
class World_Database extends MySQL
{

	public function __construct($details)
	{
		$dbIdentifier = explode('_',get_class());
		$this->setInstance(new PDO("mysql:host=".$details['host'].";dbname=".$details[$dbIdentifier[0]], $details['username'], $details['password']));
	}
	
	public function __destruct()
	{
		$this->setInstance(NULL);
	}
	
	public function getItemInfo($itemId)
	{
		$secure = $this->makeArgumentsSafe($itemId);
		$itemEntry = $this->getInstance()->query("SELECT entry,name,displayid,Quality,InventoryType FROM `item_template` WHERE entry=".$secure);
		return $this->fetchResult($itemEntry);
	}
}
?>