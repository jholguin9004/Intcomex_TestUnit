<?php

namespace Intcomex\UnitTest\Api\Data;

interface UnitTestInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const ID = 'id';
    const STATUS = 'status';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    
    /**
     * Get id
     * @return string|null
     */
    public function getId();

    /**
     * Set id
     * @return string|null
     */
    public function setId($id);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();
    
    /**
     * Set status
     * @return string|null
     */
    public function setStatus($status);

    /**
     * Get name
     * @return string|null
     */
    public function getName();
    
    /**
     * Set name
     * @return string|null
     */
    public function setName($name);

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();
    
    /**
     * Set description
     * @return string|null
     */
    public function setDescription($description);

}