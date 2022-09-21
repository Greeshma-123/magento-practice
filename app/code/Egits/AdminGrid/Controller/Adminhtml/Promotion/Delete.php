<?php

namespace Egits\AdminGrid\Controller\Adminhtml\Promotion;

use Magento\Framework\App\Action\HttpPostActionInterface;

class Delete extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        
        if ($id) {

            try {
                // init model and delete
                $model = $this->_objectManager->create(\Egits\AdminGrid\Model\Promotion::class);
                $model->load($id);
        
                $model->delete();
                
                // display success message
                $this->messageManager->addSuccessMessage(__('The page has been deleted.'));
                
                return $resultRedirect->setPath('promotionslider/promotion/index');
            } catch (\Exception $e) {
                
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('promotionslider/promotion/edit', ['id' => $id]);
            }
        }
        
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a page to delete.'));
        
        // go to grid
        return $resultRedirect->setPath('promotionslider/promotion/index');
    }
}
