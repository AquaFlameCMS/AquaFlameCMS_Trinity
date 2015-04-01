<?php
/*
 * GRANT SELECT,UPDATE ON test.account TO 'root'@'199.188.122.133' IDENTIFIED BY '123456';
 * FLUSH PRIVILEGES;
 */
	ini_set("display_errors",false);			// To check PHP error comment this line
	//ini_set("display_errors",true);			// To verify PHP errors uncomment this line

	define("DB_HOST",		"127.0.0.1");	    // Host to access the database
	define("DB_USER",		"root");			// User to access the database
	define("DB_PASS",		"123456");			// Password to access the database
	define("DB_NAME",		"website");			// Name database amending
	define("DB_TYPE",		"mysql");			// Database: mysql, mssql

	define("REQUIRED_IP",	"");				// IP address required to access this script
	define("REQUIRED_KEY",	"712h21g6vy815ed");	// Identification key to access this script

	define("TABLE_NAME",	"users");			// Nombre de la tabla que contiene los datos de cuenta
	define("ACCOUNT_FIELD",	"login");			// Nombre del campo que guarda el login de la cuenta
	define("COINS_FIELD",	"donation_points");	// Nombre del campo que guarda los creditos comprados

	define("COINS_DEFAULT_ADD",		1);		    // Number of credits that add to send a sms

	$coins_per_country=Array(
		"al"=>1,	// Albania
		"ar"=>1,	// Argentina
		"at"=>1,	// Austria
		"au"=>1,	// Australia
		"ba"=>1,	// B&H 
		"be"=>1,	// Belgica
		"bg"=>1,	// Bulgaria
		"bo"=>1,	// Bolivia
		"br"=>1,	// Brasil
		"ca"=>1,	// Canada
		"ch"=>1,	// Suiza
		"cl"=>1,	// Chile
		"cn"=>1,	// China
		"co"=>1,	// Colombia
		"cz"=>1,	// Republica Checa
		"de"=>1,	// Alemania
		"dk"=>1,	// Dinamarca
		"ec"=>1,	// Ecuador
		"ee"=>1,	// Estonia
		"es"=>1,	// España
		"fi"=>1,	// Finlandia
		"fr"=>1,	// Francia
		"gb"=>1,	// Reino Unido
		"gp"=>1,	// Guadalupe
		"gr"=>1,	// Grecia
		"gt"=>1,	// Guatemala
		"hn"=>1,	// Honduras
		"hr"=>1,	// Croacia
		"hu"=>1,	// Hungria
		"ie"=>1,	// Irlanda
		"it"=>1,	// Italia
		"lt"=>1,	// Lituania
		"lu"=>1,	// Luxemburgo
		"lv"=>1,	// Letonia
		"ma"=>1,	// Marruecos
		"me"=>1,	// Montenegro
		"mk"=>1,	// Macedonia
		"mx"=>1,	// Mexico
		"my"=>1,	// Malasya
		"ng"=>1,	// Nigeria
		"ni"=>1,	// Nicaragua
		"nl"=>1,	// Holanda
		"no"=>1,	// Noruega
		"pa"=>1,	// Panama
		"pe"=>1,	// Peru
		"pl"=>1,	// Polonia
		"pt"=>1,	// Portugal
		"ro"=>1,	// Rumania
		"rs"=>1,	// Serbia
		"ru"=>1,	// Rusia
		"se"=>1,	// Suecia
		"si"=>1,	// Slovenia
		"sk"=>1,	// Slovakia
		"sv"=>1,	// El Salvador
		"ua"=>1,	// Ukrania
		"us"=>1,	// Estados Unidos
		"uy"=>1,	// Uruguay
		"ve"=>1,	// Venezuela
		"za"=>1,	// Sudafrica
	);
//--------------------------------------------------------------------------//
/* From now on, we recommend not to change the code to maintain
   Default operation script. All changes must be made on data found above.*/
//-------------------------------------------------------------------------//
	if(REQUIRED_KEY) if(!isset($_GET["key"])||$_GET["key"]!=REQUIRED_KEY) die("Clave de seguridad no valida. IP: {$_SERVER["REMOTE_ADDR"]}");
	if(REQUIRED_IP) if($_SERVER["REMOTE_ADDR"]!=REQUIRE_IP) die("Acceso no permitido.");
//  if(REQUIRED_IP) if($_SERVER["REMOTE_ADDR"]!=REQUIRE_IP&&$_SERVER["REMOTE_ADDR"]!="**SU_IP***") die("Acceso no permitido.");

	if(!isset($_GET["login"])) die("No ha ingresado el login.");
	$login=strtr($_GET["login"],"['\"]\\/","      ");

	MyDB::myconnect(DB_HOST,DB_NAME,DB_USER,DB_PASS,DB_TYPE);
	$coins=CoinsData::findCoins(TABLE_NAME,ACCOUNT_FIELD,COINS_FIELD,$login);
	if($coins===false) die("Usuario no encontrado.");

	if(isset($_GET["country"])&&isset($coins_per_country[$_GET["country"]]))
	{
		$coins+=$coins_per_country[$_GET["country"]];
	} else {
		$coins+=COINS_DEFAULT_ADD;
	}
	CoinsData::sumCoins(TABLE_NAME,ACCOUNT_FIELD,COINS_FIELD,$login,$coins);
	die("OK");
//-------------------------------------------------------------------//
	class CoinsData
	{
		public static function findCoins($table,$account,$coins,$login)
		{
			$sql="SELECT $coins AS coins FROM $table WHERE $account='$login';";
			$result=MyDB::mydoAll($sql);
			if(is_array($result)&&count($result)) return($result[0]["coins"]);
			else return(false);
		}
		public static function sumCoins($table,$account,$coins,$login,$value)
		{
			$sql="UPDATE $table SET $coins='$value' WHERE $account='$login';";
			MyDB::myexecute($sql);
		}
	}
//-------------------------------------------------------------------//
	class MyDB
	{
		private static $mydb=false;
		public static function myconnect($host,$dbname,$user,$pass,$type="mysql")
		{
			if($type=="mysql") return(self::$mydb=new MyDBMySQL($host,$dbname,$user,$pass));
			if($type=="mssql") return(self::$mydb=new MyDBMSSQL($host,$dbname,$user,$pass));
			else return(false);
		}
		private static function myfetchAll($result)
		{
			return(self::$mydb->myfetchAll($result));
		}
		public static function mydoAll($sql)
		{
			return(self::$mydb->mydoAll($sql));
		}
		public static function myexecute($sql)
		{
			return(self::$mydb->myexecute($sql));
		}
		public static function myid()
		{
			return(self::$mydb->myid());
		}
	}
//-------------------------------------------------------------------//
	class MyDBMySQL
	{
		private $myconnection=false;
		public function __construct($host,$dbname,$user,$pass)
		{
			return($this->myconnect($host,$dbname,$user,$pass));
		}
		private function myconnect($host,$dbname,$user,$pass)
		{
			$this->myconnection=mysql_connect($host,$user,$pass);
			if(!$this->myconnection) die("Error conect&aacute;ndose a la base de datos. Verifique los datos y permisos de su conexi&oacute;n.");
			if(!mysql_select_db($dbname,$this->myconnection)) die("Error, la base de datos $dbname no puede ser accedida.");
			return($this->myconnection);
		}
		private function myfetchAll($result)
		{
			if(mysql_affected_rows($this->myconnection)==-1) return(false);
			if(!is_resource($result))
			{
				return(false);
			} else {
				while($rows[]=mysql_fetch_array($result,MYSQL_ASSOC));
				array_pop($rows);
				return($rows);
			}
		}
		public function mydoAll($sql)
		{
			$result=$this->myexecute($sql);
			return($this->myfetchAll($result));
		}
		public function myexecute($sql)
		{
			if($result=mysql_query($sql,$this->myconnection)) return($result);
			else die("Error al ejecutar la consulta.");
		}
		public function myid()
		{
			return(mysql_insert_id($this->myconnection));
		}
	}
//-------------------------------------------------------------------//
	class MyDBMSSQL
	{
		private $myconnection=false;
		public function __construct($host,$dbname,$user,$pass)
		{
			return($this->myconnect($host,$dbname,$user,$pass));
		}
		private function myconnect($host,$dbname,$user,$pass)
		{
			$this->myconnection=mssql_connect($host,$user,$pass);
			if(!$this->myconnection) die("Error");
			if(!mssql_select_db($dbname,$this->myconnection)) die("Error");
			return($this->myconnection);
		}
		private function myfetchAll($result)
		{
			if(mssql_rows_affected($this->myconnection)==-1) return(false);
			if(!is_resource($result))
			{
				return(false);
			} else {
				while($rows[]=mssql_fetch_array($result,MYSQL_ASSOC));
				array_pop($rows);
				return($rows);
			}
		}
		public function mydoAll($sql)
		{
			$result=$this->myexecute($sql);
			return($this->myfetchAll($result));
		}
		public function myexecute($sql)
		{
			$result=mssql_query($sql,$this->myconnection);
			return($result);
		}
		public function myid()
		{
			return(false);
		}
	}
?>
