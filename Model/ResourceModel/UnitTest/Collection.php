<?php
namespace Intcomex\UnitTest\Model\ResourceModel\UnitTest;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'intcomex_unittest_collection';
	protected $_eventObject = 'unittest_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Intcomex\UnitTest\Model\UnitTest', 'Intcomex\UnitTest\Model\ResourceModel\UnitTest');
	}

}