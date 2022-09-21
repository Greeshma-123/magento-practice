<?php
namespace Egits\Ordercomment\Model;

use Magento\Quote\Model\QuoteIdMaskFactory;
use Egits\Ordercomment\Api\GuestordercommentmanagementInterface;
use Egits\Ordercomment\Api\OrdercommentmanagementInterface;
use Egits\Ordercomment\Api\Data\OrdercommentInterface;

class Guestordercommentmanagement implements GuestordercommentmanagementInterface
{
    protected $quoteIdMaskFactory;
    protected $orderCommentManagement;

    public function __construct(
        QuoteIdMaskFactory $quoteIdMaskFactory,
        OrdercommentmanagementInterface $orderCommentManagement
    )
    {
        $this->quoteIdMaskFactory = $quoteIdMaskFactory;
        $this->orderCommentManagement = $orderCommentManagement;
    }

    public function saveOrdercomment($cartId, OrdercommentInterface $orderComment)
    {

        $quoteIdMask = $this->quoteIdMaskFactory->create()->load($cartId, 'masked_id');
        return $this->orderCommentManagement->saveOrdercomment($quoteIdMask->getQuoteId(),$orderComment);
    }
    
}