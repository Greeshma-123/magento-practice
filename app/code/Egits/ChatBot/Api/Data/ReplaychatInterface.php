<?php
namespace Egits\ChatBot\Api\Data;

interface ReplaychatInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                = 'id';
    const THREAD_ID         = 'thread_id';
    const CUSTOMER_ID       = 'customer_id';
    const CHAT              = 'chat';
    const USERADMIN         = 'user_or_admin';
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';
    

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get Thread_Id
     *
     * @return string
     */
    public function getThreadId();

        /**
     * Get Customer_ID
     *
     * @return string|null
     */
    public function getCustomerId();

    /**
     * Get Chat
     *
     * @return string|null
     */
    public function getChat();


    /**
     * Get useradmin
     *
     * @return string|null
     */
    public function getUserOrAdmin();

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
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setId($id);

    /**
     * Set Thread_Id
     *
     * @param string $thread
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setThreadId($thread_id);

           /**
     * Set CustomerId
     *
     * @param string $customerId
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setCustomerId($customer_id);

        /**
     * Set Chat
     *
     * @param string $chat
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setChat($chat);

    /**
     * Set useradmin
     *
     * @param string $user_admin
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setUserOrAdmin($user_admin);

    /**
     * Set created at
     *
     * @param string $created_at
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setCreatedAt($created_at);

    /**
     * Set updated at
     *
     * @param string $updated_at
     * @return \Egits\ChatBot\Api\Data\ReplaychatInterface
     */
    public function setUpdatedAt($updated_at);

}






