<?php
 
namespace Egits\AdminGrid\Model;
 
use Egits\AdminGrid\Model\ResourceModel\Promotion\CollectionFactory;
 
use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $collection;
    protected $_loadedData;
    protected $_storeManager;

    public function __construct(
    $name, $primaryFieldName, $requestFieldName, CollectionFactory $postCollectionFactory, StoreManagerInterface $storeManager, array $meta = [], array $data = []
    )
    {
        $this->collection = $postCollectionFactory->create();
        $this->_storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        

        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $this->_loadedData[$item->getId()] = $item->getData();

            if ($item->getImage()) {

            $img['image'][0]['name'] = $item->getImage();

            
            // print_r($img['image'][0]['name']);
            // die;

            $img['image'][0]['url'] = $this->getMediaUrl().$item->getImage();

            $fullData = $this->_loadedData;
            $this->_loadedData[$item->getId()] = array_merge($fullData[$item->getId()], $img);
            }



        }

        return $this->_loadedData;
    }

    public function getMediaUrl()
    {
        $mediaUrl = $this->_storeManager->getStore()
                        ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);

        return $mediaUrl;
    }

}