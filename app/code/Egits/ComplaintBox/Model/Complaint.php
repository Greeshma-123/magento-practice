<?php
 
 namespace Egits\ComplaintBox\Model;
  
 use Magento\Framework\Model\AbstractModel;
 use Egits\ComplaintBox\Api\Data\ComplaintInterface;
use Magento\Framework\DataObject\IdentityInterface;
  
 class Complaint extends \Magento\Framework\Model\AbstractModel implements ComplaintInterface, IdentityInterface
   {
  /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'egits_complaintbox_complaint';

    /**
     * @var string
     */
    protected $_cacheTag = 'egits_complaintbox_complaint';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'egits_complaintbox_complaint';

    /**
     * Initialize resource model
     *
     * @return void
     */

  
     protected function _construct()
  
 {
  
         $this->_init('Egits\ComplaintBox\Model\ResourceModel\Complaint');
  
   }
  
 public function getIdentities()
  
     {
  
         return [self::CACHE_TAG . '_' . $this->getId()];
  
     }

	    /**
	     * Get ID
	     *
	     * @return int|null
	     */
	    public function getId()
	    {
		return $this->getData(self::ID);
	    }


    /**
     * Get COMPLAINT Key
     *
     * @return string
     */
    public function getComplaint()
    {
        return $this->getData(self::COMPLAINT);
    }

    /**
     * Get ORDER_ID
     *
     * @return string|null
     */
    public function getOrderId()
    {
        return $this->getData(self::ORDER_ID);
    }

    /**
     * Get CUSTOMER_ID
     *
     * @return string|null
     */
    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    
    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return \Egits\ComplaintBox\Api\Data\ComplaintInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Set complaint
     *
     * @param string $complaint
     * @return \Egits\ComplaintBox\Api\Data\ComplaintInterface
     */
    public function setComplaint($complaint)
    {
        return $this->setData(self::COMPLAINT, $complaint);
    }

    /**
     * Set order_id
     *
     * @param string $order_id
     * @return \Egits\ComplaintBox\Api\Data\ComplaintInterface
     */
    public function setOrderId($order_id)
    {
        return $this->setData(self::ORDER_ID, $order_id);
    }

    /**
     * Set customer_id
     *
     * @param string $customer_id
     * @return \Egits\ComplaintBox\Api\Data\ComplaintInterface
     */
    public function setCustomerId($customer_id)
    {
        return $this->setData(self::CUSTOMER_ID, $customer_id);
    }

    /**
     * Set created at
     *
     * @param string $created_at
     * @return \Egits\ComplaintBox\Api\Data\ComplaintInterface
     */
    public function setCreatedAt($created_at)
    {
        return $this->setData(self::CREATED_AT, $created_at);
    }

    /**
     * Set update time
     *
     * @param string $updated_at
     * @return \Egits\ComplaintBox\Api\Data\ComplaintInterface
     */
    public function setUpdatedAt($updated_at)
    {
        return $this->setData(self::UPDATED_AT, $updated_at);
    }

  

}





