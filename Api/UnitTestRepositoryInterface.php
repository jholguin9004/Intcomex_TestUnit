<?php

namespace Intcomex\UnitTest\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface UnitTestRepositoryInterface
{

    /**
     * Save UnitTest
     * @param \Intcomex\UnitTest\Api\Data\UnitTestInterface $UnitTest
     * @return \Intcomex\UnitTest\Api\Data\UnitTestInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Intcomex\UnitTest\Api\Data\UnitTestInterface $UnitTest
    );

    /**
     * Set UnitTest Status by ID
     * @param string $unitTestId
     * @param string $status
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function status($unitTestId, $status);
}

