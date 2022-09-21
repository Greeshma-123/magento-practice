<?php
 namespace Egits\ChatBot\Model;
 
 use Egits\ChatBot\Api\Data\ReplaychatInterface;
 use Magento\Framework\DataObject\IdentityInterface;
  
 class Replaychat extends \Magento\Framework\Model\AbstractModel implements ReplaychatInterface, IdentityInterface
   {
  /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'egits_chatbot_replaychat';

    /**
     * @var string
     */
    protected $_cacheTag = 'egits_chatbot_replaychat';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'egits_chatbot_replaychat';

    /**
     * Initialize resource model
     *
     * @return void
     */

  
     protected function _construct()
  
 {
  
         $this->_init('Egits\ChatBot\Model\ResourceModel\Replaychat');
  
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
     * Get chat Key
     *
     * @return string
     */
    public function getChat()
    {
        return $this->getData(self::CHAT);
    }

    /**
     * Get Thread_ID
     *
     * @return string|null
     */
    public function getThreadId()
    {
        return $this->getData(self::THREAD_ID);
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
     * Get user_or_admin
     *
     * @return string|null
     */
    public function getUserOrAdmin()
    {
        return $this->getData(self::USERADMIN);
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
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

        /**
     * Set customer_id
     *
     * @param string $customer_id
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setCustomerId($customer_id)
    {
        return $this->setData(self::CUSTOMER_ID, $customer_id);
    }


    /**
     * Set chat
     *
     * @param string $chat
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setChat($chat)
    {
        return $this->setData(self::CHAT, $chat);
    }

    /**
     * Set Thread_id
     *
     * @param string $Thread_id
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setThreadId($thread_id)
    {
        return $this->setData(self::THREAD_ID, $thread_id);
    }


    /**
     * Set user_admin
     *
     * @param string $user_admin
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setUserOrAdmin($user_admin)
    {
        return $this->setData(self::USERADMIN, $user_admin);
    }


    /**
     * Set created at
     *
     * @param string $created_at
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setCreatedAt($created_at)
    {
        return $this->setData(self::CREATED_AT, $created_at);
    }

    /**
     * Set update time
     *
     * @param string $updated_at
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setUpdatedAt($updated_at)
    {
        return $this->setData(self::UPDATED_AT, $updated_at);
    }
}