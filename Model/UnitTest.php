<?php
namespace Intcomex\UnitTest\Model;

class UnitTest extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'intcomex_unittest';

	protected $_cacheTag = 'intcomex_unittest';

	protected $_eventPrefix = 'intcomex_unittest';

	protected function _construct(){
		$this->_init('Intcomex\UnitTest\Model\ResourceModel\UnitTest');
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
}