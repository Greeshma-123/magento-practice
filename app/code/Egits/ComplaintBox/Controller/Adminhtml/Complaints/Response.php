<?php
namespace Egits\ComplaintBox\Controller\Adminhtml\Complaints;

// use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Backend\App\Action;

class Response extends \Magento\Backend\App\Action 
{
    // protected $_coreRegistry;
    protected $resultPageFactory;
    protected $ComplaintFactory;
 
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        // \Magento\Framework\Registry $registry,
        \Egits\ComplaintBox\Model\ComplaintFactory $ComplaintFactory
    ) 
    {
        $this->resultPageFactory = $resultPageFactory;
        // $this->_coreRegistry = $registry;
        $this->ComplaintFactory = $ComplaintFactory;
        parent::__construct($context);
    }
 
    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Egits_ComplaintBox::complaint'); 
        return $resultPage;
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        // $model = $this->ComplaintFactory->create();
        // if ($id) 
        // {
        //     $model->load($id);
        //     if (!$model->getId()) 
        //     {
        //         $this->messageManager->addErrorMessage(__('This page no longer exists.'));
        //         $resultRedirect = $this->resultRedirectFactory->create();
        //         return $resultRedirect->setPath('order_complaint/complaints/index');
        //     }
        // }  
        // $this->_coreRegistry->register('order_complaint_complaints_response', $model);
        $resultPage = $this->_initAction();
        return $resultPage;
    }
}