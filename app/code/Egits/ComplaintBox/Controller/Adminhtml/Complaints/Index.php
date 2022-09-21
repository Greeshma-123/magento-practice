<?php
	namespace Egits\ComplaintBox\Controller\Adminhtml\Complaints;
	class Index extends \Magento\Backend\App\Action
	{
		protected $_pageFactory;

		public function __construct(
			\Magento\Backend\App\Action\Context $context,
			\Magento\Framework\View\Result\PageFactory $pageFactory)
		{
			$this->_pageFactory = $pageFactory;
			return parent::__construct($context);
		}
		public function execute()
		{
			$resultPage =  $this->_pageFactory->create();
			$resultPage->setActiveMenu('Egits_ComplaintBox::complaint');
			$resultPage->getConfig()->getTitle()->prepend((__('Order Complaint')));
			return $resultPage;
		}
	}
