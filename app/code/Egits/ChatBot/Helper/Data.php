<?php

namespace Egits\ChatBot\Helper;
use Magento\Framework\App\Helper\AbstractHelper;
class Data extends AbstractHelper
{
  protected $_customers;

public function __construct(
    \Magento\Customer\Model\Customer $customers
) {
    $this->_customers = $customers;
}

public function getCustomerEmail($id)
{
    $customer = $this->_customers->load($id);
    return $customer->getEmail();
}


 }