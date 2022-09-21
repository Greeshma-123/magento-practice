<?php
namespace Egits\ProductSuggestion\Block;

class WishlistProduct extends \Magento\Framework\View\Element\Template
{
    public $customerSession;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Wishlist\Model\Wishlist $wishlist,
        \Magento\Wishlist\Model\ResourceModel\Item\CollectionFactory $_wishlistCollectionFactory,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productcollection,
        \Magento\Catalog\Model\CategoryFactory $CategoryFactory,
        \Magento\Catalog\Model\ProductCategoryList $productCategory,
        array $data = []
    ) {
        $this->wishlist = $wishlist;
        $this->_wishlistCollectionFactory = $_wishlistCollectionFactory;
        $this->customerSession = $customerSession;
        $this->productcollection = $productcollection;
        $this->categoryFactory = $CategoryFactory;
        $this->productCategory = $productCategory;
        parent::__construct($context,$data);
    }
    /**
    * @param int $customerId
    */
    public function getWishlistByCustomerId()
    {
        if ($this->customerSession->isLoggedIn()) 
            {
                $wishlistproduct = $this->_wishlistCollectionFactory->create()
                ->addCustomerIdFilter($this->customerSession->getCustomerId());
                return $wishlistproduct;
            }
        // $wishlist = $this->wishlist->loadByCustomerId($customerId, true)->getItemCollection();
        // return $wishlist;
        // return $this->_wishlistCollectionFactory->create()->addCustomerIdFilter($customerId);
    }

    public function getProductCollectionByCategories($categoryIds)
    {
        $collection = $this->productcollection->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $categoryIds]);
        return $collection;
    }
}