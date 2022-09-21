<?php
namespace Egits\ChatBot\Block\Thread;

use Magento\Customer\Model\Session;
use Magento\Backend\Block\Template\Context;
use Egits\ChatBot\Model\ResourceModel\Replaychat\CollectionFactory;
class Chatview extends \Magento\Framework\View\Element\Template
{
public $customerSession;

public $context;

public $chatfactory;

protected $threadFactory;
 
public function __construct(
    Context $context,
    Session $customerSession,
    CollectionFactory $chatfactory,
    \Egits\ChatBot\Model\ThreadFactory $threadFactory,
    array $data = []
)
{
    $this->customerSession = $customerSession;
    $this->chatfactory = $chatfactory;
    $this->threadFactory = $threadFactory;
    parent::__construct($context, $data);
}

public function getCustomerSession()
{
    return $this->customerSession;
}


// public function getAdminChat()
// {
//     $thread_id =$this->getRequest()->getParam('thread_id');

    
//     $customerid = $this->customerSession->getCustomer()->getId();
//     $collection = $this->chatfactory->create()
//     ->addFieldToSelect('*')
//     ->addFieldToFilter('customer_id', $customerid)
//     ->addFieldToFilter('thread_id', $thread_id)
//     ->addFieldToFilter('user_or_admin', 1);
 
//     return $collection;
// }

// public function getUserChat()
// {
//     $thread_id =$this->getRequest()->getParam('thread_id');

    
//     $customerid = $this->customerSession->getCustomer()->getId();
//     $collection = $this->chatfactory->create()
//     ->addFieldToSelect('*')
//     ->addFieldToFilter('customer_id', $customerid)
//     ->addFieldToFilter('thread_id', $thread_id)
//     ->addFieldToFilter('user_or_admin', 0);
 
//     return $collection;
// }
public function getChatview()
{
    $thread_id =$this->getRequest()->getParam('thread_id');

    $customerid = $this->customerSession->getCustomer()->getId();
    $collection = $this->chatfactory->create()
    ->addFieldToSelect('*')
    ->addFieldToFilter('customer_id', $customerid)
    ->addFieldToFilter('thread_id', $thread_id);
    return $collection;
}



}