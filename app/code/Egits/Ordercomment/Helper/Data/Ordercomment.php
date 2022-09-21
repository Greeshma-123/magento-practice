<?php
namespace Egits\Ordercomment\Helper\Data;

use Egits\Ordercomment\Api\Data\OrdercommentInterface;
use Magento\Framework\Api\AbstractSimpleObject;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Ordercomment extends AbstractSimpleObject implements OrdercommentInterface
{
   
    const COMMENT_FIELD_NAME = 'egits_order_comment';

    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig, array $data = []) {
        parent::__construct($data);
        $this->scopeConfig = $scopeConfig;
    }
    
    public function getComment() {
        return $this->_get(static::COMMENT_FIELD_NAME);
    }

    public function setComment($comment) {
        return $this->setData(static::COMMENT_FIELD_NAME, $comment);
    }

   
}
