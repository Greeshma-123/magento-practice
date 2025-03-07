<?php
		namespace Egits\AdminGrid\Controller\Adminhtml\Promotion;
		class Index extends \Magento\Backend\App\Action
		{
		    protected $resultPageFactory = false;
		    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
		    {
			parent::__construct($context);
			$this->resultPageFactory = $resultPageFactory;
		    }

			
		    public function execute()
		    {
			$resultPage = $this->resultPageFactory->create();
			$resultPage->setActiveMenu('Egits_AdminGrid::promotion');
			$resultPage->getConfig()->getTitle()->prepend((__('Promotion')));
			return $resultPage;
		    }
		}