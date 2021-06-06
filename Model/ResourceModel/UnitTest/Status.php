<?php
namespace Intcomex\UnitTest\Model\ResourceModel\UnitTest;

class Status extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_FAILED = 'failed';
    const STATUS_CANCELED = 'canceled';

    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        $this->_options = [
            ['label'=> __("Pending"), 'value' => self::STATUS_PENDING],
            ['label'=> __("Accepted"), 'value' => self::STATUS_ACCEPTED],
            ['label'=> __("Failed"), 'value' => self::STATUS_FAILED],
            ['label'=> __("Canceled"), 'value' => self::STATUS_CANCELED],
        ];
        return $this->_options;
    }

    /**
     * Get a text for option value
     *
     * @param string|integer $value
     * @return string|bool
     */
    public function getOptionText($value)
    {
        foreach ($this->getAllOptions() as $option) {
            if ($option['value'] == $value) {
                return $option['label'];
            }
        }
        return false;
    }
}