<?php
namespace Egits\Ordercomment\Api;

interface OrdercommentmanagementInterface
{
    /**
     * @param int $cartId
     * @param \Egits\Ordercomment\Api\Data\OrdercommentInterface $orderComment
     * @return string
     */
    public function saveOrdercomment(
        $cartId,
        \Egits\Ordercomment\Api\Data\OrdercommentInterface $orderComment
    );
}