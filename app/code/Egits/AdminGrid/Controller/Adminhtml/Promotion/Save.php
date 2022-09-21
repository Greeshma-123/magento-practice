<?php
 
namespace Egits\AdminGrid\Controller\Adminhtml\Promotion;
 
use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Filesystem;
use Magento\Framework\Validation\ValidationException;
use Magento\MediaStorage\Model\File\UploaderFactory;

class Save extends \Magento\Backend\App\Action {
  /**
   *
   * @var UploaderFactory
   */
  protected $uploaderFactory;

  /**
   * @var \Egits\AdminGrid\Model\PromotionFactory
   */
  protected $PromotionFactory;

  /** 
   * @var Filesystem\Directory\WriteInterface 
   */
  protected $mediaDirectory;

  public function __construct(
    Context $context,
    UploaderFactory $uploaderFactory,
    Filesystem $filesystem,
    \Egits\AdminGrid\Model\PromotionFactory $PromotionFactory
  )
  {
    parent::__construct($context);
    $this->uploaderFactory = $uploaderFactory;
    $this->PromotionFactory = $PromotionFactory;
    $this->mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
  }

  public function execute()
  {
    //edit form
    
    $id = $this->getRequest()->getParam('id');
     if($id)
      {
        $params = $this->getRequest()->getParams();
        $imageId = $params['image'][0];
          // print_r($imageId);
          //   die;
          if(empty( $imageId['tmp_name']))
          {
          
            // $lefttrim=$imageId['name'];
            // $trimimage= ltrim($lefttrim,"slider/tmp/image");
          
            $image = $this->PromotionFactory->create();
            $image->load($id);
            // $image->setImage('slider/tmp/image/'.$trimimage);
            $image->setImage($imageId['name']);
            $image->setDescription($params['description']);
            $image->setStatus($params['status']);
            $image->save();
            return $this->_redirect('promotionslider/promotion/index');
          }
          else
          {
            try 
            {
              if (isset($params['image']) && count($params['image'])) 
              {
                  $imageId = $params['image'][0];
                  //  print_r($imageId);
                  //  die;
                
                  if (!file_exists($imageId['tmp_name'])) 
                  {
                      $imageId['tmp_name'] = $imageId['path'] . '/' . $imageId['file'];

                  }
              }
                $fileUploader = $this->uploaderFactory->create(['fileId' => $imageId]);
                $fileUploader->setAllowedExtensions(['jpg', 'jpeg', 'png']);
                $fileUploader->setAllowRenameFiles(true);
                $fileUploader->setAllowCreateFolders(true);
                $fileUploader->validateFile();
                //upload image
                $info = $fileUploader->save($this->mediaDirectory->getAbsolutePath('slider/tmp/image'));
                /** @var \Egits\AdminGrid\Model\Promotion */

                $image = $this->PromotionFactory->create();
                $image->load($id);
                $image->setImage($this->mediaDirectory->getRelativePath('slider/tmp/image') . '/' . $info['file']);
                $image->setDescription($params['description']);
                $image->setStatus($params['status']);
                $image->save();
          
            } 
            catch (ValidationException $e) {
              throw new LocalizedException(__('Image extension is not supported. Only extensions allowed are jpg, jpeg and png'));
            } 

            $this->messageManager->addSuccessMessage(__('Image uploaded successfully'));
        
        
            return $this->_redirect('promotionslider/promotion/index');
          } 

      }


      // add new form

      else
      {
         try 
          {
              if ($this->getRequest()->getMethod() !== 'POST' || !$this->_formKeyValidator->validate($this->getRequest())) 
              {
                throw new LocalizedException(__('Invalid Request'));
              }
              //validate image
              $fileUploader = null;
              $params = $this->getRequest()->getParams();
                try 
                {
                  if (isset($params['image']) && count($params['image']))
                   {
                        $imageId = $params['image'][0];
                        if (!file_exists($imageId['tmp_name'])) 
                        {
                            $imageId['tmp_name'] = $imageId['path'] . '/' . $imageId['file'];
                        }
                    }
                      $fileUploader = $this->uploaderFactory->create(['fileId' => $imageId]);
                      $fileUploader->setAllowedExtensions(['jpg', 'jpeg', 'png']);
                      $fileUploader->setAllowRenameFiles(true);
                      $fileUploader->setAllowCreateFolders(true);
                      $fileUploader->validateFile();
                      //upload image
                      $info = $fileUploader->save($this->mediaDirectory->getAbsolutePath('slider/tmp/image'));
                      /** @var \Egits\AdminGrid\Model\Promotion */
                      $image = $this->PromotionFactory->create();
                      $image->setImage($this->mediaDirectory->getRelativePath('slider/tmp/image') . '/' . $info['file']);
                      $image->setDescription($params['description']);
                      $image->setStatus($params['status']);
                      $image->save();
        
                } catch (ValidationException $e) {
                  throw new LocalizedException(__('Image extension is not supported. Only extensions allowed are jpg, jpeg and png'));
                } catch (\Exception $e) {
                    //if an except is thrown, no image has been uploaded
                    throw new LocalizedException(__('Image is required'));
                }

                $this->messageManager->addSuccessMessage(__('Image uploaded successfully'));
                return $this->_redirect('promotionslider/promotion/index');
        } catch (LocalizedException $e) {
          $this->messageManager->addErrorMessage($e->getMessage());
          return $this->_redirect('promotionslider/promotion/add');
        } catch (\Exception $e) 
        {
            error_log($e->getMessage());
            error_log($e->getTraceAsString());
            $this->messageManager->addErrorMessage(__('An error occurred, please try again later.'));
            return $this->_redirect('promotionslider/promotion/add');
        }
    }

  }
}