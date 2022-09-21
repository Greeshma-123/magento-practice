<?php
namespace Egits\Popup\Helper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Popupmsg extends AbstractHelper 
{
   /**
   * @var \Magento\Framework\App\Config\ScopeConfigInterface
   */
   protected $scopeConfig;

   /**
   * Recipient email config path
   */
  
   const XML_PATH_Enabled = 'popup_msg/general/enabled';

   public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
   {
      $this->scopeConfig = $scopeConfig;
   }

   /**
   * Sample function returning config value
   **/

  public function getStatus() {
     $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;

      return $this->scopeConfig->getValue(self::XML_PATH_Enabled, $storeScope);

     }
}