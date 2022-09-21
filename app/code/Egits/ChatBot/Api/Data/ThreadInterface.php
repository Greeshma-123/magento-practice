<?php
namespace Egits\ChatBot\Api\Data;

interface ThreadInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                = 'id';
    const THREAD            = 'thread';
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
     * Get Thread
     *
     * @return string
     */
    public function getThread();

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
     * @return \Egits\ChatBot\Api\Data\ThreadInterface
     */
    public function setId($id);

    /**
     * Set Thread
     *
     * @param string $thread
     * @return \Egits\ChatBot\Api\Data\ThreadInterface
     */
    public function setThread($thread);

        /**
     * Set CustomerId
     *
     * @param string $customerId
     * @return \Egits\ChatBot\Api\Data\ThreadInterface
     */
    public function setCustomerId($customer_id);

    /**
     * Set created at
     *
     * @param string $created_at
     * @return \Egits\ChatBot\Api\Data\ThreadInterface
     */
    public function setCreatedAt($created_at);

    /**
     * Set updated at
     *
     * @param string $updated_at
     * @return \Egits\ChatBot\Api\Data\ThreadInterface
     */
    public function setUpdatedAt($updated_at);

}






