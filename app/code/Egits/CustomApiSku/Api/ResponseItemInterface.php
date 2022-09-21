<?php

namespace Egits\CustomApiSku\Api;

/**
 * Interface ResponseItemInterface
 *
 * @api
 */
interface ResponseItemInterface
{
    const DATA_ID           = 'id';
    const DATA_SKU          = 'sku';
    const DATA_QTY          = 'qty';
    const DATA_STOCK_STATUS = 'stock_status';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getSku();

    /**
     * @return string
     */
    public function getQty();

    /**
     * @return string|null
     */
    public function getStatus();

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id);

    /**
     * @param string $sku
     * @return $this
     */
    public function setSku(string $sku);

    /**
     * @param string $qty
     * @return $this
     */
    public function setQty(string $qty);

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status);
}
