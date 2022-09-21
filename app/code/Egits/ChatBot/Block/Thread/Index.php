<?php
namespace Egits\ChatBot\Block\Thread;

use Magento\Customer\Model\Session;
use Magento\Backend\Block\Template\Context;
use Egits\ChatBot\Model\ResourceModel\Thread\CollectionFactory;
class Index extends \Magento\Framework\View\Element\Template
{
public $customerSession;

public $context;

public $threadfactory;
 
public function __construct(
    Context $context,
    Session $customerSession,
    CollectionFactory $threadfactory,
    array $data = []
)
{
    $this->customerSession = $customerSession;
    $this->threadfactory = $threadfactory;
    parent::__construct($context, $data);
}

public function getCustomerSession()
{
    return $this->customerSession;
}

public function getThread()
{
    $customerid = $this->customerSession->getCustomer()->getId();

    $collection = $this->threadfactory->create()
    ->addFieldToSelect('*')
    ->addFieldToFilter('customer_id', $customerid);
   
    return $collection;
}

public function getChatUrl($thread)
{
    return $this->getUrl('chatbot/thread/chat', ['thread_id' => $thread->getId()]);
}

public function getCancelUrl($thread)
{
    return $this->getUrl('chatbot/thread/cancel', ['thread_id' => $thread->getId()]);
}

}