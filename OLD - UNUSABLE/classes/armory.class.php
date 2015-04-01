<?php
require('wowheadparser.php');
require('bootstrap.class.php');
class Factory_Armory
{
	static public function createCharacter($charName)
	{
		return new Armory_Character($charName);
	}
}
abstract class Armory
{
	protected $_objectId;
	protected $_objectInfo;
	protected $_statInfo;
	protected $_talentInfo;
	protected $_charDb;
	protected $_worldDb;
	abstract function run();
	
	public function __construct($id)
	{
		$this->_objectId = $id;
	}
	
	public function getObjectId()
	{
		return $this->_objectId;
	}
	
	public function setObjectId($id)
	{
		$this->_objectId = (int) $id;
		return $this;
	}
	
	public function getObjectInfo()
	{
		return $this->_objectInfo;
	}
	
	public function setObjectInfo($info)
	{
		$this->_objectInfo = $info;
		return $this;
	}
	
	public function getStatInfo()
	{
		return $this->_statInfo;
	}
	
	public function setStatInfo($info)
	{
		$this->_statInfo = $info;
		return $this;
	}

  	public function getTalentInfo()
	{
		return $this->_talentInfo;
	}
	
	public function setTalentInfo($info)
	{
		$this->_talentInfo = $info;
		return $this;
	}
	
	public function getCharDb()
	{
		return $this->_charDb;
	}
	
	public function setCharDb($pdo)
	{
		$this->_charDb = $pdo;
		return $this;
	}
	
	public function getWorldDb()
	{
		return $this->_worldDb;
	}
	
	public function setWorldDb($pdo)
	{
		$this->_worldDb = $pdo;
		return $this;
	}
	
}
class Armory_Character extends Armory
{
    private $_equipedItems;
    	
	public function __construct($name)
	{
		$this->setCharDb(new Character_Database(array('host' => 'localhost','username' => 'root','password'=>'password',ucfirst('character') => 'chars')));
		$this->setWorldDb(new World_Database(array('host' => 'localhost','username' => 'root','password'=>'password',ucfirst('world') => 'world')));
		$this->setObjectId($this->getCharDb()->getGuidByName($name));
		$this->setObjectInfo($this->getCharDb()->getInfoFor($this->getObjectId()));
		$this->setStatInfo($this->getCharDb()->getStats($this->getObjectId())); //Add to get stats for armory
		$this->setTalentInfo($this->getCharDb()->getTalents($this->getObjectId())); //Add to get talent infor for armory
	}
    
    private function _getEquipedItems()
    {
        return $this->_equipedItems;
    }
    
    private function _setEquipedItems($items)
    {
        $this->_equipedItems = $items;
        return $this;
    }
	
	private function _parseEquipmentCache()
	{
        $this->_setEquipedItems($this->getCharDb()->getEquipedItems($this->getObjectId()));
        $this->_fillEmpty();
        $result = array();
        foreach($this->_getEquipedItems() as $slot => $item)
        {
            if($item[0] == NULL)
            {
                $result[$slot] = $item;
            }else{
                $itemTemplate = $this->getWorldDb()->getItemInfo($item["itemEntry"]);
                $result[$slot] = array($item["itemEntry"],$slot,$itemTemplate->InventoryType,$itemTemplate,new wowheadparser($item["itemEntry"]));
            }
        }
        return $this->_orderItems($result);
	}	
	
	private function _getWeaponForClass()
	{
		$result;
		switch ($this->getObjectInfo()->class)
		{
			case 1:		$result = array(17,14,15); break;
			case 2: 	$result = array(17,14,28); break;
			case 3:		$result = array(21,22,15); break;
			case 4:		$result = array(21,22,25); break;
			case 8:
			case 9:
			case 5:		$result = array(21,23,26); break;
			case 11:
			case 6:		$result = array(21,22,28); break;
			case 7: 	$result = array(21,22,26); break;
		}
		return $result;
	}
	
	private function _fillEmpty()
	{
	   $items = $this->_getEquipedItems();
	   for($i = 0; $i <= 18; $i++)
       {
            if($items[$i] == NULL)
            {
                switch($i)
                {
                    case 14:
                        $items[$i] = array(NULL,$i,$i+2,NULL,NULL);
                        break;
                    case 15:
                    case 16:
                    case 17:
                        $wpn = $this->_getWeaponForClass();
                        $items[$i] = array(NULL,$i,$wpn[17 - $i],NULL,NULL);
                        break;
                    default:
                        $items[$i] = array(NULL,$i,$i+1,NULL,NULL);
                        break;
                }
            }
       }
       $this->_setEquipedItems($items);
	}
    
    private function _orderItems($items)
    {
        $result = array();
        for($i = 0; $i <= 18;$i++)
        {
            switch($i)
            {
                case 3:
                    $result[] = $items[14];
                    break;
                case 4:
                    $result[] = $items[4];
                    break;
                case 5:
                    $result[] = $items[3];
                    break;
                case 6:
                    $result[] = $items[18];
                    break;
                case 7:
                    $result[] = $items[8];
                    break;
                case 8:
                    $result[] = $items[9];
                    break;
                case 9:
                    $result[] = $items[5];
                    break;
                case 10:
                case 11:
                case 12:
                case 13:
                case 14:
                case 15:
                    if($i <= 11)
                    {
                        $koef = 4;
                    }elseif($i > 11){
                        $koef = 2;
                    }
                    $result[] = $items[$i - $koef];
                    break;
                case 16:
                    $result[] = $items[$i - 1];
                default:
                    if(count($result) <= 18)
                    {
                        $result[] = $items[$i];
                    }
                    break;
            }
        }
        return $result;
    }
	
	private function _viewItems($input)
	{
        $pixelWidth = 0;
        $intItr = 0;
        $pxs = array("-6","271","548");
		foreach($input as $item)
		{
            if($intItr <= 7 || $item[1] > 15)
            {
                $alignment = "left";
                $alignment3 = "";
            }elseif($intItr > 7 && $intItr <= 15)
            {
                $alignment = "right";
                $alignment3 = "slot-align-right";
            }elseif($item[1] == 15){
                $alignment = "left";
            }
            if($intItr > 15)
            {
                $alignment2 = "bottom";
            }else{
                $alignment2 = "top";
            }
            if($item[1] <= 14)
            {
                $px = "0";
            }elseif($item[1] > 14 && $item[1] <= 17){
                $px = $pxs[$item[1] - 15];
                $pixelWidth = 0;
            }
			if($item[0] === NULL)
			{
				echo '<div data-id="'.$item[1].'" data-type="'.$item[2].'" class="slot slot-'.$item[1].' '.$alignment3.'" style=" '.$alignment.': '.$px.'px; '.$alignment2.': '.$pixelWidth.'px;">
		<div class="slot-inner">
			<div class="slot-contents">
				<a href="javascript:;" class="empty"><span class="frame"></span></a>
			</div>
		</div>
	</div>
		';
			}else{
				echo '<div data-id="'.$item[1].'" data-type="'.$item[2].'" class="slot slot-'.$item[1].' '.$alignment3.' item-quality-'.$item[3]->Quality.'" style=" '.$alignment.': '.$px.'px; '.$alignment2.': '.$pixelWidth.'px;">
					<div class="slot-inner">
						<div class="slot-contents">
						<a rel="item='.$item[0].'" class="item" data-item="">
						'.$item[4]->getItemImage().'
						<span class="frame"></span></a>
							<div class="details">
                                <span class="name-shadow">'.$item[3]->name.'</span>
								<span class="name color-q'.$item[3]->Quality.'"><a rel="item='.$item[0].'">'.$item[3]->name.'</a></span>
								</span>
								<!--<span class="enchant-shadow">
									Intellect
								</span>
									<div class="enchant color-q2">
										<a href="/wow/en/item/52753">Intellect</a>
									</div>-->
								<!--<span class="level">397</span>
								<span class="sockets">
								<span class="icon-socket socket-2">
									<a href="/wow/en/item/52236" class="gem">
									<img src="http://eu.media.blizzard.com/wow/icons/18/inv_misc_cutgemsuperior3.jpg" alt="" />
								<span class="frame"></span>
										</a>
									</span>
								</span>-->
							</div>
						</div>
					</div>
				</div>
				';
			}
            $pixelWidth += 58;
            if($intItr == 7 || $item[1] == 13)
            {
                $pixelWidth = 0;
            }
            $intItr++;		
		}
	}
	
	public function run()
	{
		$result = $this->_parseEquipmentCache();
		$this->_viewItems($result);
        //print_r($result);
	}
    
/*    public function runStats()
    {
        $stats = $this->getCharDb()->getStats($this->getObjectId());
        print_r($stats);
    } Not needed now I think*/
}   

?>