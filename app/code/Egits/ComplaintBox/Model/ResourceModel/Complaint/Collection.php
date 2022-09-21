<?php 
namespace Egits\ComplaintBox\Model\ResourceModel\Complaint;
	class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
		
		public function _construct(){
			$this->_init("Egits\ComplaintBox\Model\Complaint","Egits\ComplaintBox\Model\ResourceModel\Complaint");
		}
	}
?>