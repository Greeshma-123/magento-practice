<?php
namespace Egits\CustomApiSku\Api;

interface ProductItemInterface
{
    /**
     * Return a filtered product.
     *
     * @param string $sku
     * @return \Egits\CustomApiSku\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getItem(string $sku);

}