<?php
namespace Egits\ComplaintBox\Block\Response;
use Egits\ComplaintBox\Model\ResourceModel\Complaint\CollectionFactory ;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $customerSession;
    public $context;
    public $ComplaintCollection;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        CollectionFactory $ComplaintCollection,
        array $data = []
    ) 
    {
        parent::__construct($context, $data);
        $this->ComplaintCollection = $ComplaintCollection;
        $this->customerSession = $customerSession;
    }

    public function getComplaintResponse()
    {
        $customerid = $this->customerSession->getCustomer()->getId();
        $collection = $this->ComplaintCollection->create()
        ->addFieldToSelect('*')
        ->addFieldToFilter('customer_id', $customerid)
        ->addFieldToFilter('response', ['neq'=>NULL]);
        return $collection;
    }

    // public function _prepareLayout()
    // {

    //     var_dump($this->customerSession->getCustomer()->getData());
    //     exit();
    //     return parent::_prepareLayout();
    // }
}