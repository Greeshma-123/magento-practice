<?php
namespace Egits\ComplaintBox\Api\Data;

interface ComplaintInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                = 'id';
    const COMPLAINT         = 'complaint';
    const ORDER_ID          = 'order_id';
    const CUSTOMER_ID       = 'customer_id';
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';
    

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get Complaint
     *
     * @return string
     */
    public function getComplaint();

    /**
     * Get ORDER_ID
     *
     * @return string|null
     */
    public function getOrderId();


    /**
     * Get Customer_ID
     *
     * @return string|null
     */
    public function getCustomerId();

    /**
     * Get created at
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Get updated at
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set ID
     *
     * @param int $id
     * @return \Egits\ComplaintBox\Api\Data\ErrorInterface
     */
    public function setId($id);

    /**
     * Set Complaint
     *
     * @param string $Complaint
     * @return \Egits\ComplaintBox\Api\Data\ErrorInterface
     */
    public function setComplaint($complaint);

    /**
     * Set OrderId
     *
     * @param string $OrderId
     * @return \Egits\ComplaintBox\Api\Data\ErrorInterface
     */
    public function setOrderId($order_id);

        /**
     * Set CustomerId
     *
     * @param string $CustomerId
     * @return \Egits\ComplaintBox\Api\Data\ErrorInterface
     */
    public function setCustomerId($customer_id);

    /**
     * Set created at
     *
     * @param string $created_at
     * @return \Egits\ComplaintBox\Api\Data\ErrorInterface
     */
    public function setCreatedAt($created_at);

    /**
     * Set updated at
     *
     * @param string $updated_at
     * @return \Egits\ComplaintBox\Api\Data\ErrorInterface
     */
    public function setUpdatedAt($updated_at);

}






