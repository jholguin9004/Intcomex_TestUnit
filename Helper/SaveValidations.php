<?php
namespace Intcomex\UnitTest\Helper;

use Intcomex\UnitTest\Model\ResourceModel\UnitTest\Status;

class SaveValidations extends \Magento\Framework\App\Helper\AbstractHelper{

    protected $status;

    public function __construct(
        Status $status,
        \Magento\Framework\App\Helper\Context $context
    ){
        $this->status = $status;
        parent::__construct($context);
    }

    private function checkStatus($_status){
        foreach($this->status->getAllOptions() as $status){
            if($status['value'] == $_status) return true;
        }
        throw new \Exception("Invalid status '$_status'");
    }

    public function validateData($data, $type){
        switch($type){
            case 'status':
                $this->checkStatus($data);
                break;
            case 'save':
            case 'save_api':
                if($type == 'save_api'){
                    //Si es nuevo no puedo indicar ID
                    if(array_key_exists('id', $data)){
                        throw new \Exception("You can not add id");
                    }
                }
                //Name required
                if(!isset($data['name']) || empty($data['name'])){
                    throw new \Exception("Name is required");
                }
                //Description required
                if(!isset($data['description']) || empty($data['description'])){
                    throw new \Exception("Description is required");
                }
                //Status required
                if(!isset($data['status']) || empty($data['status'])){
                    $data['status'] = 'pending';
                }else{
                    $this->checkStatus($data['status']);
                }
                break;
        }
        return $data;
    }



}
