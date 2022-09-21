<?php
namespace Egits\ComplaintBox\Controller\Adminhtml\Complaints;

class Save extends \Magento\Backend\App\Action
{
    protected $ComplaintFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context, 
        \Egits\ComplaintBox\Model\ComplaintFactory $ComplaintFactory
        )
    {
        $this->ComplaintFactory = $ComplaintFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id=$data['id'];
  
        if(!$data) 
        {
            $this->_redirect('order_complaint/complaints/response');
            return;
        }
        try 
        {
            $collection = $this->ComplaintFactory->create();
            
            $collection->load($id);
            
            $response=  $collection->getResponse();
          if($response=='' && $data['response']!='')
          {
            $collection->setResponse($data['response']);
            $collection->save();
            $this->messageManager->addSuccess(__('Response has been successfully saved.'));
            return $this->_redirect('order_complaint/complaints/index');
           
          }
          elseif($response!='')
          {
            $this->messageManager->addError(__('Response already added.'));
            return $this->_redirect('order_complaint/complaints/index');
          }

          elseif (!$data['response']) 
          {
            $this->messageManager->addError(__('response field is empty.'));
            return $this->_redirect('order_complaint/complaints/response');
          
          }

        }
        catch (\Exception $e) 
        {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('order_complaint/complaints/index');
    }
}


