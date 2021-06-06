<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Intcomex\UnitTest\Controller\Adminhtml\Intcomexunittest;

class Edit extends \Intcomex\UnitTest\Controller\Adminhtml\Intcomexunittest
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create(\Intcomex\UnitTest\Model\UnitTest::class);
        
        if($id){
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Unit Test no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('intcomex_unittest', $model);
        
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Unit Test') : __('Edit Unit Test'),
            $id ? __('Edit Unit Test') : __('Edit Unit Test')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Unit Test'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __(sprintf('View Unit Test %1', $model->getId())) : __('New Unit Test'));
        return $resultPage;
    }
}

