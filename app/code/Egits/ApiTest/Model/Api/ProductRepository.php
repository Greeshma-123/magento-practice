<?php
namespace Egits\ApiTest\Model\Api;

use Egits\ApiTest\Api\ProductRepositoryInterface;
use Egits\ApiTest\Api\ResponseItemInterfaceFactory;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    private $productCollectionFactory;
    /**
     * @var \Egits\ApiTest\Api\ResponseItemInterfaceFactory
     */
    private $responseItemFactory;

    public function __construct(
        CollectionFactory $productCollectionFactory,
        ResponseItemInterfaceFactory $responseItemFactory
    ) 
    {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->responseItemFactory = $responseItemFactory;
    }
    
    public function getItem(int $id)
    {
        $collection = $this->getProductCollection()->addAttributeToFilter('entity_id', ['eq' => $id]);
        
        /** @var \Magento\Catalog\Api\Data\ProductInterface $product */
        $product = $collection->getFirstItem();
        if (!$product->getId()) 
        {
            throw new NoSuchEntityException(__('Product not found'));
        }
        return $this->getResponseItemFromProduct($product);
    }

    /**
     * {@inheritDoc}
     *
     * @return \Egits\ApiTest\Api\ResponseItemInterface[]
     */
    public function getList()
    {
        $collection = $this->getProductCollection();
        $result = [];
        /** @var \Magento\Catalog\Api\Data\ProductInterface $product */
        foreach ($collection->getItems() as $product) 
        {
            $result[] = $this->getResponseItemFromProduct($product);
        }
        return $result;
    }

    /**
     * {@inheritDoc}
     *
     * @param \Egits\ApiTest\Api\RequestItemInterface[] $products
     * @return void
     */

    private function getProductCollection()
    {
        $collection = $this->productCollectionFactory->create();
        $collection
            ->addAttributeToSelect(
                [
                    'entity_id',
                    'sku',
                    'name',
                    // ProductInterface::SKU,
                    // ProductInterface::NAME,
                    'description'
                ],
                'left'
            );
        return $collection;
    }
    private function getResponseItemFromProduct(ProductInterface $product)
    {
        /** @var \Egits\ApiTest\Api\ResponseItemInterface $responseItem */
        $responseItem = $this->responseItemFactory->create();
        $responseItem->setId($product->getId())
            ->setSku($product->getSku())
            ->setName($product->getName())
            ->setDescription($product->getDescription());
        return $responseItem;
    }
}