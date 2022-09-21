<?php
namespace Egits\Ordercomment\Api;

interface GuestordercommentmanagementInterface
{
    /**
     * @param string $cartId
     * @param \Egits\Ordercomment\Api\Data\OrdercommentInterface $orderComment
     * @return \Magento\Checkout\Api\Data\PaymentDetailsInterface
     */


    public function saveOrdercomment(
        $cartId,
        \Egits\Ordercomment\Api\Data\OrdercommentInterface $orderComment
    );
}