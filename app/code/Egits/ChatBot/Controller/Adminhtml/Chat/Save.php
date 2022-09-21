<?php
namespace Egits\ChatBot\Controller\Adminhtml\Chat;
use Egits\ChatBot\Model\ResourceModel\Thread\CollectionFactory;
class Save extends \Magento\Backend\App\Action
{
    protected $ReplaychatFactory;
    protected $ThreadFactory;
    protected $CollectionFactory;

    public function __construct(
        CollectionFactory $CollectionFactory,
        \Magento\Backend\App\Action\Context $context, 
        \Egits\ChatBot\Model\ReplaychatFactory $ReplaychatFactory,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        \Egits\ChatBot\Model\ThreadFactory $ThreadFactory
        )
    {
        $this->ReplaychatFactory = $ReplaychatFactory;
        $this->ThreadFactory = $ThreadFactory;
        $this->date = $date;
        $this->CollectionFactory = $CollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        // print_r($data);
        // die;
        $id=$data['id'];
        $thread = $this->ThreadFactory->create();
        $thread->load($id); 
        $status=  $thread->getApprove();

            if($data['replay']=='') 
            {
                $this->messageManager->addError(__('replay field is empty.'));
                return $this->_redirect('thread/chat/index');
            }
            try 
            {
                if($status==0)
                {
                    $this->messageManager->addError(__('Thread is not approved.'));
                    return $this->_redirect('thread/chat/index');
                }
                else
                {
                    $collection = $this->CollectionFactory->create()
                    ->addFieldToSelect('*')
                    ->addFieldToFilter('id', $id);
                    foreach($collection as $item)
                    {
                        $approve=$item['approve'];
                        if($approve == 2)
                        {
                        $this->messageManager->addError(__('Thread is cancelled.'));
                        return $this->_redirect('thread/chat/index');
                        }
                        else
                        {
                            $date = $this->date->gmtDate();
                            //save values in chat table
                            $collection = $this->ReplaychatFactory->create();
                            $collection->setThreadId($data['id']);
                            $collection->setChat($data['replay']);
                            $collection->setUserOrAdmin(1);
                            $collection->setCustomerId($data['customer_id']);
                            $collection->save();

                            // save update value in thread table after admin send replay to the thread
                            $threadcollection = $this->ThreadFactory->create();
                            $threadcollection->load($id);
                            $threadcollection->setUpdatedAt($date);
                            $threadcollection->save();

                            $this->messageManager->addSuccess(__('chat has been successfully saved.'));
                            return $this->_redirect('thread/chat/index');
                        }
                    }
                }
            }
        catch (\Exception $e) 
        {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('thread/chat/index');
    }
}


