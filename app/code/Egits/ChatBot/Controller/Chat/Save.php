<?php
namespace Egits\ChatBot\Controller\Chat;
use Egits\ChatBot\Model\ReplaychatFactory;
use Magento\Framework\App\Action\Context;
use Egits\ChatBot\Model\ResourceModel\Thread\CollectionFactory;

class Save extends \Magento\Framework\App\Action\Action
{
 
    protected $ReplaychatFactory;

    protected $session;
    protected $CollectionFactory;

    public function __construct(
        Context $context,
        CollectionFactory $CollectionFactory,
        \Egits\ChatBot\Model\ReplaychatFactory $ReplaychatFactory,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        \Magento\Customer\Model\Session $session,
        \Egits\ChatBot\Model\ThreadFactory $ThreadFactory
      )
      {
     
        $this->ReplaychatFactory = $ReplaychatFactory;
        $this->session = $session;
        $this->date = $date;
        $this->ThreadFactory = $ThreadFactory;
        $this->CollectionFactory = $CollectionFactory;
        
        parent::__construct($context);
      }
 
    public function execute()
    {
        $post = $this->getRequest()->getPost();
        $date = $this->date->gmtDate();
        $id= $post['thread_id'];

        $collection = $this->CollectionFactory->create()
        ->addFieldToSelect('*')
        ->addFieldToFilter('id', $id);
        foreach($collection as $item)
        {
        $approve=$item['approve'];
            if($approve == 2)
            {
              $this->messageManager->addError(__('Thread is cancelled.'));
              return $this->_redirect('chatbot/thread/index');
            }
            else{
              $createthread = $this->ReplaychatFactory->create();
              $createthread->setThreadId($post['thread_id']);
              $createthread->setCustomerId($post['customer_id']);
              $createthread->setChat($post['chat']);
              $createthread->setUserOrAdmin(0);
              $createthread->save();
      
                // save update value in thread table after admin send replay to the thread
                $threadcollection = $this->ThreadFactory->create();
                $threadcollection->load($id);
                $threadcollection->setUpdatedAt($date);
                $threadcollection->save();
                $this->messageManager->addSuccess(__('chat has been successfully saved.'));
              return $this->_redirect('chatbot/thread/index');
            }
        }


    }

}