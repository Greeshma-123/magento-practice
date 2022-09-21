<?php
namespace Egits\ChatBot\Controller\Thread;
use Egits\ChatBot\Model\ThreadFactory;
use Magento\Framework\App\Action\Context;

class Cancel extends \Magento\Framework\App\Action\Action
{
    protected $threadFactory;

    protected $session;

    protected $CollectionFactory;

    public function __construct(
        Context $context,
        \Egits\ChatBot\Model\ThreadFactory $threadFactory,
        \Egits\ChatBot\Model\ResourceModel\Thread\CollectionFactory $CollectionFactory
       
      )
      {
        $this->CollectionFactory = $CollectionFactory;
        $this->threadFactory = $threadFactory;

        parent::__construct($context);
      }
 
    public function execute()
    {
        $id = $this->getRequest()->getParam('thread_id');
     

        $thread = $this->threadFactory->create();
        $thread->load($id);
            
        $status=  $thread->getApprove();

        if($status== 2) 
        {
            $this->messageManager->addError(__('thread already cancelled.'));
            return $this->_redirect('chatbot/thread/index');
        }
        else{

       
         // save update value in thread table after admin send replay to the thread
         $threadcollection = $this->threadFactory->create();
         $threadcollection->load($id);
         $threadcollection->setApprove(2);
         $threadcollection->save();

         $this->messageManager->addSuccess(__('Thread Successfully Canceled.'));
         return $this->_redirect('chatbot/thread/index');

        }


    }
}