<?php
namespace Egits\Pharmacy\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory ;
use Magento\Widget\Block\BlockInterface;

class Category extends Template implements BlockInterface
{
    protected $_template = "widget/showdata.phtml";

    public $categoryCollection;

    public function __construct(
     Context $context,
     CollectionFactory $categoryCollection
    )
    {
        $this->categoryCollection = $categoryCollection;
        parent::__construct($context);
    }

    public function getCategoryCollection()
    {
        $collection = $this->categoryCollection->create()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('category_attribute', '1');
        return $collection;
    }
}