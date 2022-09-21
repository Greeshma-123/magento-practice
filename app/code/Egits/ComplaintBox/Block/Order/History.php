<?php
namespace Egits\ComplaintBox\Block\Order;

class History extends \Magento\Sales\Block\Order\History
{

    public function getComplaintUrl($order)
    {
        return $this->getUrl('complaint/history/newform', ['order_id' => $order->getId()]);
    }
    
}