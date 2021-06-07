<?php
namespace Intcomex\UnitTest\Observer;

use Magento\Framework\Event\ObserverInterface;
use Intcomex\UnitTest\Logger\Logger;

class RegisterFailed implements ObserverInterface
{

    protected $logger;

    public function __construct(
        Logger $logger
    ) {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->logger->info('Failed status register START');
        $unitTest = $observer->getData('unitTest');
        $unitTestId = $observer->getData('unitTestId');
        $msg = "Failed status detected. Data: " . print_r($unitTest, true);
        $this->logger->info($msg);
        $this->logger->info('Failed status register END');
    }
}