<?php
namespace Egits\CustomApiSku\Model;
use Egits\CustomApiSku\Api\ResponseItemInterface;
use Magento\Framework\DataObject;

class ResponseItem extends DataObject implements ResponseItemInterface
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_getData(self::DATA_ID);
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->_getData(self::DATA_SKU);
    }

    /**
     * @return string
     */
    public function getQty()
    {
        return $this->_getData(self::DATA_QTY);
    }

    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_getData(self::DATA_STOCK_STATUS);
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        return $this->setData(self::DATA_ID, $id);
    }

    /**
     * @param string $sku
     * @return $this
     */
    public function setSku(string $sku)
    {
        return $this->setData(self::DATA_SKU, $sku);
    }

    /**
     * @param string $qty
     * @return $this
     */
    public function setQty(string $qty)
    {
        return $this->setData(self::DATA_QTY, $qty);
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status)
    {
        return $this->setData(self::DATA_STOCK_STATUS, $status);
    }
}
