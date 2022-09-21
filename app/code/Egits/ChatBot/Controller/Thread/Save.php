<?php
namespace Egits\ChatBot\Controller\Thread;
use Egits\ChatBot\Model\ThreadFactory;
use Magento\Framework\App\Action\Context;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $threadFactory;

    protected $session;

    protected $CollectionFactory;

    public function __construct(
        Context $context,
        \Egits\ChatBot\Model\ThreadFactory $threadFactory,
        \Egits\ChatBot\Model\ResourceModel\Thread\CollectionFactory $CollectionFactory,
        \Magento\Customer\Model\Session $session
      )
      {
        $this->CollectionFactory = $CollectionFactory;
        $this->threadFactory = $threadFactory;
        $this->session = $session;
        parent::__construct($context);
      }
 
    public function execute()
    {
        $post = $this->getRequest()->getPost();
        $thread= $post['thread'];
        if ($this->session->isLoggedIn()) 
          {
            $customer_id = $this->session->getCustomer()->getId();
          }
          $collection = $this->CollectionFactory->create()
          ->addFieldToSelect('*');
         
          foreach ($collection as $item)
          {
              if($item['approve']==1)
              {
                $this->messageManager->addError(__('Thread is already in use.'));
                return $this->_redirect('chatbot/thread/index');
              }
              elseif($item['approve']==0)
              {
                $this->messageManager->addError(__('Thread is already in use.'));
                return $this->_redirect('chatbot/thread/index');
              }
            
          }
              // print_r($complaint);die;
              $createthread = $this->threadFactory->create();

              $createthread->setThread($thread);
              $createthread->setCustomerId($customer_id);

              $createthread->save();
              return $this->_redirect('chatbot/thread/index');
    }
}