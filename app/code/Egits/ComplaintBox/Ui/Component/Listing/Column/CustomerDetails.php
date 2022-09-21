<?php
 namespace Egits\ComplaintBox\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Listing\Columns\Column;
/**
 * Class CustomerEmail
*/
 class CustomerDetails extends Column
 {
    private $urlBuilder;

    protected $helper;

    const CUSTOMER_URL_PATH_EDIT = 'customer/index/edit';
    
    public function __construct(
       ContextInterface $context,
       UiComponentFactory $uiComponentFactory,
       \Egits\ComplaintBox\Helper\Data $helper,
       UrlInterface $urlBuilder,
       array $components = [],
       array $data = []
    ) {
       parent::__construct(
        $context, $uiComponentFactory, 
       $components, $data);
       $this->urlBuilder = $urlBuilder;
       $this->helper = $helper;
    }
  public function prepareDataSource(array $dataSource)
   {
       if (isset($dataSource['data']['items'])) {
         foreach ($dataSource['data']['items'] as &$item) {
             $name = $this->getData('name');
             if (isset($item['customer_id'])) {
                $CustomerEmail = $this->helper->getCustomerEmail($item['customer_id']);
                //@codingStandardsIgnoreStart
                $item[$name] = html_entity_decode(
                    '<a href="' .
                    $this->urlBuilder->getUrl(
                        self::CUSTOMER_URL_PATH_EDIT,
                        [
                            'id' => $item['customer_id'],
                        ]
                    )
                    . '" target="_blank" >' . $CustomerEmail . '</a>'
                );
                //@codingStandardsIgnoreEnd
            }
        }
    }
    return $dataSource;
  }
}
 