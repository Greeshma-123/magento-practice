<?php 
namespace Egits\ChatBot\Model\ResourceModel\Thread;
	class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
		
		public function _construct(){
			$this->_init("Egits\ChatBot\Model\Thread","Egits\ChatBot\Model\ResourceModel\Thread");
		}
	}
?>