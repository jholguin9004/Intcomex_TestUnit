<?php
namespace Intcomex\UnitTest\Model;

use Intcomex\UnitTest\Api\Data\UnitTestInterface;
use Intcomex\UnitTest\Api\Data\UnitTestInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Intcomex\UnitTest\Helper\SaveValidations;

class UnitTest extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'intcomex_unittest';

	protected $_cacheTag = 'intcomex_unittest';

	protected $_eventPrefix = 'intcomex_unittest';

	protected $dataObjectHelper;

	protected $unitTestFactory;

	protected $saveValidations;

	public function __construct(
		\Magento\Framework\Model\Context $context,
		\Magento\Framework\Registry $registry,
		\Intcomex\UnitTest\Model\ResourceModel\UnitTest $resource,
        \Intcomex\UnitTest\Model\ResourceModel\UnitTest\Collection $resourceCollection,
		UnitTestInterfaceFactory $unitTestFactory,
		DataObjectHelper $dataObjectHelper,
        SaveValidations $saveValidations,
		array $data = []
	){
		$this->unitTestFactory = $unitTestFactory;
        $this->dataObjectHelper = $dataObjectHelper;
		$this->saveValidations = $saveValidations;
		parent::__construct($context, $registry, $resource, $resourceCollection, $data);
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}

	public function save(){
		$this->saveValidations->validateData($this->getData(), 'save');
        parent::save();
    }

	/**
     * Retrieve formax_price_planning model with formax_price_planning data
     * @return UnitTestInterface
     */
    public function getDataModel()
    {
        $unitTest = $this->getData();
		
        $unitTestObject = $this->unitTestFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $unitTestObject,
            $unitTest,
            UnitTestInterface::class
        );
        return $unitTestObject;
    }
}