<?php
 
 namespace Egits\CategoryList\Block;
  
 use Magento\Catalog\Model\Product;
  
 class Categorylist extends \Magento\Framework\View\Element\Template
{
     protected $_categoryFactory;
  
     protected $_storeManager;
  
     protected $_categoryNameFactory;
  
     public function __construct(
         \Magento\Framework\View\Element\Template\Context $context,
         \Magento\Catalog\Model\CategoryFactory $categoryNameFactory,
         \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collecionFactory,
         \Magento\Store\Model\StoreManagerInterface $storeManager,
         \Magento\Framework\Registry $registry,
         array $data = []
     )
     {
         $this->_coreRegistry = $registry;
         $this->_categoryNameFactory = $categoryNameFactory;
         $this->_categoryFactory = $collecionFactory;
         $this->_storeManager = $storeManager;
         parent::__construct($context, $data);
     }
  
     public function getEnableCategory()
     {
  
         $category = $this->_categoryFactory->create()
         ->addFieldToSelect('*')
         ->addFieldToFilter('is_active', ['eq' => 1])
         ->setStore($this->_storeManager->getStore());
         return $category;
         
     }
  
    public function getCategoryName($categoryId)
    {
         $category = $this->_categoryNameFactory->create()->load($categoryId)->setStore($this->_storeManager->getStore());
         return $category;
    }
}