<?php
namespace Egits\ComplaintBox\Model\ResourceModel;


class Complaint extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
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
    $this->_init('order_complaint', 'id');// table name and primary key
    }

    }