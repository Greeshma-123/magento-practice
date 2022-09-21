<?php
 
 namespace Egits\ChatBot\Model;
 
 use Magento\Framework\Model\AbstractModel;
 use Egits\ChatBot\Api\Data\ThreadInterface;
 use Magento\Framework\DataObject\IdentityInterface;
  
 class Thread extends \Magento\Framework\Model\AbstractModel implements ThreadInterface, IdentityInterface
   {
  /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'egits_chatbot_thread';

    /**
     * @var string
     */
    protected $_cacheTag = 'egits_chatbot_thread';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'egits_chatbot_thread';

    /**
     * Initialize resource model
     *
     * @return void
     */

  
     protected function _construct()
  
 {
  
         $this->_init('Egits\ChatBot\Model\ResourceModel\Thread');
  
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
     * Get Thread Key
     *
     * @return string
     */
    public function getThread()
    {
        return $this->getData(self::THREAD);
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
     * @return \Egits\ChatBot\Api\Data\ThreadInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Set Thread
     *
     * @param string $Thread
     * @return \Egits\ChatBot\Api\Data\ThreadInterface
     */
    public function setThread($thread)
    {
        return $this->setData(self::THREAD, $thread);
    }

    /**
     * Set customer_id
     *
     * @param string $customer_id
     * @return \Egits\ChatBot\Api\Data\ThreadInterface
     */
    public function setCustomerId($customer_id)
    {
        return $this->setData(self::CUSTOMER_ID, $customer_id);
    }

    /**
     * Set created at
     *
     * @param string $created_at
     * @return \Egits\ChatBot\Api\Data\ThreadInterface
     */
    public function setCreatedAt($created_at)
    {
        return $this->setData(self::CREATED_AT, $created_at);
    }

    /**
     * Set update time
     *
     * @param string $updated_at
     * @return \Egits\ChatBot\Api\Data\ThreadInterface
     */
    public function setUpdatedAt($updated_at)
    {
        return $this->setData(self::UPDATED_AT, $updated_at);
    }

  

}





