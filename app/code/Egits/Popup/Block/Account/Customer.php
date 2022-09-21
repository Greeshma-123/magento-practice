<?php
namespace Egits\Popup\Block\Account;
use Magento\Customer\Model\Session;
use Magento\Backend\Block\Template\Context;

class Customer extends \Magento\Framework\View\Element\Template
{
  
public $customerSession;

public $context;
 
public function __construct(
    Context $context,
    Session $customerSession,
    array $data = []
)
{
    $this->customerSession = $customerSession;
    parent::__construct($context, $data);
}

public function getCustomerSession()
{
    return $this->customerSession;
}

}

?>