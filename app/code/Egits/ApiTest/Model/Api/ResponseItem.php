<?php
namespace Egits\ApiTest\Model\Api;
use Egits\ApiTest\Api\ResponseItemInterface;
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
    public function getName()
    {
        return $this->_getData(self::DATA_NAME);
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->_getData(self::DATA_DESCRIPTION);
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
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        return $this->setData(self::DATA_NAME, $name);
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        return $this->setData(self::DATA_DESCRIPTION, $description);
    }
}
