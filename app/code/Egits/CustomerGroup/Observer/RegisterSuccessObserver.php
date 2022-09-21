<?php
namespace Egits\CustomerGroup\Observer;
use Magento\Framework\Event\ObserverInterface;

class RegisterSuccessObserver implements ObserverInterface
{
    public function __construct(
        \Magento\Customer\Model\Customer $customer 
    )
    {
        $this->customer = $customer;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $id = $observer->getEvent()->getCustomer()->getId();
        $customer = $this->customer->load($id);
        $this->customerGroupid($customer);  
    }  

    // set group id 5 for customers have email domain 'eglobeits.com' and set group id 1 for others

    public function customerGroupid($customer)
    {
        $DiscountGroup=5;
        $GuestGroupId=1;
        $emailid = $customer->getEmail();   
        list($user, $domain) = explode('@',$emailid);
        if ($domain == 'eglobeits.com')
        {
            $customer->setGroupId($DiscountGroup);     
        }
        else
        {
            $customer->setGroupId($GuestGroupId);  
        }
        $customer->save();
    }
}