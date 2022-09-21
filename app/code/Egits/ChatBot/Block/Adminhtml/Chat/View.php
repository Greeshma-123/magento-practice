<?php
namespace Egits\ChatBot\Block\Adminhtml\Chat;

use Magento\Backend\Block\Template\Context;
use Egits\ChatBot\Model\ResourceModel\Replaychat\CollectionFactory;
class View extends \Magento\Backend\Block\Template
{
    public $context;

    public $ReplychatFactory;
    
    
    public function __construct(
        Context $context,

        CollectionFactory $ReplychatFactory,
        array $data = []
    )
    {
        $this->ReplychatFactory = $ReplychatFactory;
        parent::__construct($context, $data);
    }

    public function getChatview()
    {
        $thread_id =$this->getRequest()->getParam('id');

        $collection = $this->ReplychatFactory->create()
        ->addFieldToSelect('*')
        ->addFieldToFilter('thread_id', $thread_id);

        return $collection;
    }


    

}