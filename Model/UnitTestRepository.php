<?php

namespace Intcomex\UnitTest\Model;

use Intcomex\UnitTest\Api\UnitTestRepositoryInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Intcomex\UnitTest\Model\ResourceModel\UnitTest as ResourceUnitTest;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Intcomex\UnitTest\Helper\SaveValidations;

class UnitTestRepository implements UnitTestRepositoryInterface
{
    protected $extensibleDataObjectConverter;

    protected $unitTestFactory;

    protected $resource;

    protected $saveValidations;

    /**
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     * @param UnitTestFactory $unitTestFactory
     * @param ResourceUnitTest $resource
     */
    public function __construct(
        ExtensibleDataObjectConverter $extensibleDataObjectConverter,
        UnitTestFactory $unitTestFactory,
        ResourceUnitTest $resource,
        SaveValidations $saveValidations
    ) {
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
        $this->unitTestFactory = $unitTestFactory;
        $this->resource = $resource;
        $this->saveValidations = $saveValidations;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Intcomex\UnitTest\Api\Data\UnitTestInterface $unitTest
    ) {       
        $unitTestData = $this->extensibleDataObjectConverter->toNestedArray(
            $unitTest,
            [],
            \Intcomex\UnitTest\Api\Data\UnitTestInterface::class
        );
        
        try {
            $unitTestData = $this->saveValidations->validateData($unitTestData, 'save_api');
            $unitTestModel = $this->unitTestFactory->create()->setData($unitTestData);
            $this->resource->save($unitTestModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the unitTest: %1',
                $exception->getMessage()
            ));
        }
        return $unitTestModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function update(
        \Intcomex\UnitTest\Api\Data\UnitTestInterface $unitTest,
        $status
    ) {
        try {
            $unitTestModel = $this->unitTestFactory->create();
            $this->resource->load($unitTestModel, $unitTest->getId());
            $this->saveValidations->validateData($status, 'status');
            $unitTestModel->setStatus($status)->save();
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                "Could not update the unit_test: %1",
                $exception->getMessage()
            ));
        }
        return $unitTestModel->getData();
    }

    /**
     * {@inheritdoc}
     */
    public function get($unitTestId)
    {
        $unitTestModel = $this->unitTestFactory->create();
        $this->resource->load($unitTestModel, $unitTestId);
        if (!$unitTestModel->getId()) {
            throw new NoSuchEntityException(__('unit_test with id "%1" does not exist.', $unitTestId));
        }
        return $unitTestModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function status($unitTestId, $status)
    {
        return $this->update($this->get($unitTestId), $status);
    }
}

