<?php
namespace Egits\ChatBot\Cron;
use Egits\ChatBot\Model\ResourceModel\Thread\CollectionFactory;
use Egits\ChatBot\Model\ThreadFactory;
class Chat 
{
    protected ThreadFactory $ThreadFactory;
    protected CollectionFactory $collectionFactory;
    public function __construct( 
    CollectionFactory $collectionFactory,
    ThreadFactory $ThreadFactory,
    \Magento\Framework\Stdlib\DateTime\DateTime $date
    ) 
    {
        $this->collectionFactory = $collectionFactory;
        $this->ThreadFactory = $ThreadFactory;
        $this->date = $date;
    }
    public function execute()
    {
        $date = $this->date->gmtDate();  
        $collection = $this->collectionFactory->create()
        ->addFieldToSelect('*')
        ->addFieldToFilter('approve', ['neq'=>2]);
        foreach($collection as $item)
        {
            $id=$item['id'];
            $updated = $item['updated_at'];
            $time= strtotime($updated);
            $currenttime= strtotime($date);
            $cuurentdatetime = date("Y-m-d H:i", $currenttime);
            $addtime = $time + (60 * 60 * 24 );
            $updatetime = date("Y-m-d H:i", $addtime);
                if($updatetime == $cuurentdatetime)
                {
                    $thread = $this->ThreadFactory->create();
                    $thread->load($id);
                    $thread->setApprove(2);
                    $thread->save();
                }
        }
    }
}