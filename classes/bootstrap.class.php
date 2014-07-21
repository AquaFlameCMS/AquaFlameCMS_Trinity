<?php
require('mysql.class.php');
class Configuration
{
    private $_dbHost = DBHOST;
    private $_dbUser = DBUSER;
    private $_dbPass = DBPASS;
    
    private $_dbName = array("Character" => DBCHAR,"World" => BDWORLD,"Realm" => DBAUTH);
    
    public function getOption($name)
    {
        $var = "_".$name;
        return $this->$var;
    }
    
    public function getDBName($db)
    {
        return $this->_dbName[$db];
    }
    
    public function getCountCharsDB()
    {
        return count($this->_dbName["Character"]);
    }
}

class Bootstrap
{
    private $_configuration;
    private $_selfInstance;
    private $_dbStore;
    
    public function __construct()
    {
        $this->setConfiguration(new Configuration());
        $this->_selfInstance = $this;
        $this->_dbStore = new DB_Store($this->getBootstrap());
    }
    
    public function getDbStore()
    {
        return $this->_dbStore;
    }
    
    public function setDbStore($store)
    {
        $this->_dbStore = $store;
        return $this;
    }
    
    public function getBootstrap()
    {
        return $this->_selfInstance;
    }
    
    public function getConfiguration()
    {
        return $this->_configuration;
    }
    
    public function setConfiguration($config)
    {
        $this->_configuration = $config;
        return $this;
    }
}
?>
