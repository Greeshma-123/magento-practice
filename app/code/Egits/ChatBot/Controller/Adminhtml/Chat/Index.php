<?php
	namespace Egits\ChatBot\Controller\Adminhtml\Chat;
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
			$resultPage->setActiveMenu('Egits_ChatBot::Thread');
			$resultPage->getConfig()->getTitle()->prepend((__('Thread')));
			return $resultPage;
		}
	}
