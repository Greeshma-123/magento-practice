<?php
namespace Egits\CustomApiSku\Model;

use Egits\CustomApiSku\Api\ProductItemInterface;
use Egits\CustomApiSku\Api\ResponseItemInterfaceFactory;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\CatalogInventory\Model\Stock\StockItemRepository;
use Magento\Catalog\Model\Product as Product;

class ProductItem implements ProductItemInterface
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    private $productCollectionFactory;
    /**
     * @var \Egits\CustomApiSku\Api\ResponseItemInterfaceFactory
     */
    private $responseItemFactory;

        /**
     * @var StockItemRepository
     */
    protected StockItemRepository $stockItemRepository;

    protected $product;

    public function __construct(
        CollectionFactory $productCollectionFactory,
        ResponseItemInterfaceFactory $responseItemFactory,
        StockItemRepository $stockItemRepository,
        Product $product
    ) 
    {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->responseItemFactory = $responseItemFactory;
        $this->stockItemRepository = $stockItemRepository;
        $this->product = $product;
    }
    
    public function getItem(string $sku)
    {
        $productcollection = $this->productCollectionFactory->create();
        $collection = $productcollection->addAttributeToFilter('sku', ['eq' => $sku]);
        
        /** @var \Magento\Catalog\Api\Data\ProductInterface $product */
        $product = $collection->getFirstItem();
        if (!$product->getSku()) 
        {
            throw new NoSuchEntityException(__('Product not found'));
        }
        return $this->getResponseItemFromProduct($product);
    }

    private function getResponseItemFromProduct(ProductInterface $product)
    {
        /** @var \Egits\CustomApiSku\Api\ResponseItemInterface $responseItem */
        $responseItem = $this->responseItemFactory->create();
        
        $productId=$this->product->getIdBySku($product->getSku());
        if($productId){
            $productStock = $this->stockItemRepository->get($productId);
            $productQty = $productStock->getQty();
            $productstatus = $productStock->getIsInStock();
           if($productstatus == 1) 
           {
            $responseItem->setId($product->getId())
       
            ->setSku($product->getSku())
            ->setQty($productQty)
            ->setStatus('instock');
               return $responseItem;
           }
           else
           {
            $responseItem->setId($product->getId())
            ->setSku($product->getSku())
            ->setQty($productQty)
            ->setStatus('out of stock');
                return $responseItem;
           }
        }

    }
}