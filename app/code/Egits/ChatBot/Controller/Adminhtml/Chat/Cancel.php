<?php
namespace Egits\ChatBot\Controller\Adminhtml\Chat;
use Egits\ChatBot\Model\ResourceModel\Thread\CollectionFactory;

class Cancel extends \Magento\Backend\App\Action
{
    protected $ReplaychatFactory;
    protected $ThreadFactory;
    protected $CollectionFactory;

    public function __construct(
        CollectionFactory $CollectionFactory,
        \Magento\Backend\App\Action\Context $context, 
      
        \Egits\ChatBot\Model\ThreadFactory $ThreadFactory
        )
    {
     
        $this->ThreadFactory = $ThreadFactory;
  
        $this->CollectionFactory = $CollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
   
        // $post = $this->getRequest()->getPost();
        // $thread= $post['thread'];

        $thread = $this->ThreadFactory->create();
        $thread->load($id);
            
        $status=  $thread->getApprove();

        if($status== 2) 
        {
            $this->messageManager->addError(__('thread already cancelled.'));
            return $this->_redirect('thread/chat/index');
        }
        else{

       
         // save update value in thread table after admin send replay to the thread
         $threadcollection = $this->ThreadFactory->create();
         $threadcollection->load($id);
         $threadcollection->setApprove(2);
         $threadcollection->save();

         $this->messageManager->addSuccess(__('Thread Successfully Canceled.'));
         return $this->_redirect('thread/chat/index');

        }
        
    }
        
}


