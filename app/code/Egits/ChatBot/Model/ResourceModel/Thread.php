<?php
namespace Egits\ChatBot\Model\ResourceModel;


class Thread extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $_date;

    
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
    $this->_init('chat_thread', 'id');// table name and primary key
    }

    }