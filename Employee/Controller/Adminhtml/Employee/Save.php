<?php
declare(strict_types=1);

namespace Dtn\Employee\Controller\Adminhtml\Employee;

use Dtn\Employee\Model\EmployeeFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Save extends Action
{
    /**
     * @var EmployeeFactory
     */
    protected $employeeFactory;

    /**
     * Save constructor.
     * @param EmployeeFactory $employeeFactory
     * @param Context $context
     */
    public function __construct
    (
        EmployeeFactory $employeeFactory,
        Context $context
    )
    {
        $this->employeeFactory = $employeeFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $data = $this->getRequest()->getPost();
        $id = !empty($data['entity_id']) ? $data['entity_id'] : null;

        $newData = [
            'department_id' => $data['department_id'],
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name']
        ];

        $model = $this->employeeFactory->create();

        if ($id) {
            $model->load($id);
        }
        try {
            $model->addData($newData);
            $model->save();
            if ($this->getRequest()->getParam('back')) {
                $this->messageManager->addSuccess(__('Insert Record Successfully !'));
                return $this->_redirect('employee/employee/add');
            }
            $this->_redirect('*/*/');
            $this->messageManager->addSuccess(__('Insert Record Successfully !'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
    }
}