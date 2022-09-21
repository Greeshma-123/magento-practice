<?php
namespace Egits\ApiTest\Api;

interface ProductRepositoryInterface
{
    /**
     * Return a filtered product.
     *
     * @param int $id
     * @return \Egits\ApiTest\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getItem(int $id);

    /**
     * Return a list of the filtered products.
     *
     * @return \Egits\ApiTest\Api\ResponseItemInterface[]
     */
    public function getList();

 
}