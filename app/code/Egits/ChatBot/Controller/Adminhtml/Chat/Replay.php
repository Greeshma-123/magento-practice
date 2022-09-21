<?php
namespace Egits\ChatBot\Controller\Adminhtml\Chat;

// use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Backend\App\Action;

class Replay extends \Magento\Backend\App\Action 
{
    // protected $_coreRegistry;
    protected $resultPageFactory;
    protected $ThreadFactory;
 
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        // \Magento\Framework\Registry $registry,
        \Egits\ChatBot\Model\ThreadFactory $ThreadFactory
    ) 
    {
        $this->resultPageFactory = $resultPageFactory;
        // $this->_coreRegistry = $registry;
        $this->ThreadFactory = $ThreadFactory;
        parent::__construct($context);
    }
 
    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Egits_ChatBot::Thread'); 
        return $resultPage;
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
      
        $resultPage = $this->_initAction();
        return $resultPage;
    }
}