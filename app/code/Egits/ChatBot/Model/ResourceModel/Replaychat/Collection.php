<?php 
namespace Egits\ChatBot\Model\ResourceModel\Replaychat;
	class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
		
		public function _construct(){
			$this->_init("Egits\ChatBot\Model\Replaychat","Egits\ChatBot\Model\ResourceModel\Replaychat");
		}
	}
?>