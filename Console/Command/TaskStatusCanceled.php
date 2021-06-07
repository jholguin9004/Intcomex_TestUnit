<?php
namespace Intcomex\UnitTest\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Intcomex\UnitTest\Model\ResourceModel\UnitTest\CollectionFactory;
use Intcomex\UnitTest\Model\ResourceModel\UnitTest\Collection;

class TaskStatusCanceled extends Command
{

    protected $_collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_collection = $this->_collectionFactory->create();
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('task:status:canceled');
        $this->setDescription('Update UnitTest status to canceled');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $items = $this->getCollection();
        $count = count($items);
        $output->writeln("Found: '{$count}' items.");
        if($count){
            foreach($items as $item){
                try{
                    $item->setStatus('canceled')->save();
                }catch(\Exception $e){
                    $output->writeln($e->getMessage());
                }
            }
            $output->writeln("Update finished");
        }
    }

    private function getCollection(){
        $this->_collection->addFieldToFilter('status', array('neq' => 'canceled'));;
        return $this->_collection;
    }
}