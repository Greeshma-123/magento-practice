<?php
namespace Egits\CustomApi\Model;
use Egits\CustomApi\Api\TestInterface;
 
class Test implements TestInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name Users name.
     * @return string Greeting message with users name.
     */
    public function name($name) {
        return "Test, " . $name;
    }
}