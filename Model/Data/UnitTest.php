<?php

namespace Intcomex\UnitTest\Model\Data;

use Magento\Framework\Api\AttributeValueFactory;
use Intcomex\UnitTest\Api\Data\UnitTestInterface;

class UnitTest extends \Magento\Framework\Api\AbstractExtensibleObject implements UnitTestInterface
{

    public function __construct(
        \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory,
        AttributeValueFactory $attributeValueFactory,
        \Magento\Customer\Api\AddressMetadataInterface $metadataService,
        $data = []
    ) {
        parent::__construct($extensionFactory, $attributeValueFactory, $data);
    }

    /**
     * Get id
     * @return string|null
     */
    public function getId()
    {
        return $this->_get(self::ID);
    }

    /**
     * Set id
     * @param string $unitTestId
     * @return \Intcomex\UnitTest\Api\Data\UnitTestInterface
     */
    public function setId($unitTestId)
    {
        return $this->setData(self::ID, $unitTestId);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Intcomex\UnitTest\Api\Data\UnitTestInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Intcomex\UnitTest\Api\Data\UnitTestInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get description
     * @return string|null
     */
    public function getDescription()
    { 
        return $this->_get(self::DESCRIPTION);
    }

    /**
     * Set description
     * @param string $description
     * @return \Intcomex\UnitTest\Api\Data\UnitTestInterface
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }
}

