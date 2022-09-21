<?php
namespace Egits\ComplaintBox\Controller\History;
use Egits\ComplaintBox\Model\ComplaintFactory;
use Magento\Framework\App\Action\Context;

class Save extends \Magento\Framework\App\Action\Action
{
 
    protected $ComplaintFactory;

    protected $session;

    public function __construct(
        Context $context,
        \Egits\ComplaintBox\Model\ComplaintFactory $ComplaintFactory,
        \Magento\Customer\Model\Session $session
      )
      {
     
        $this->ComplaintFactory = $ComplaintFactory;
        $this->session = $session;
        parent::__construct($context);
      }
 
    public function execute()
    {
        $post = $this->getRequest()->getPost();

        $complaint= $post['complaint'];
        $orderid= $post['order_id'];

        if ($this->session->isLoggedIn()) 
          {
            $customer_id = $this->session->getCustomer()->getId();

          }
        
        // print_r($complaint);die;
        $newcomplaint = $this->ComplaintFactory->create();
        $newcomplaint->setComplaint($complaint);
        $newcomplaint->setOrderId($orderid);
        $newcomplaint->setCustomerId($customer_id);

        $newcomplaint->save();
        return $this->_redirect('sales/order/history');

    }

}