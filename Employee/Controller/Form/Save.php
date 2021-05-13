<?php

declare(strict_types=1);

namespace Dtn\Employee\Controller\Form;

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
     * AddDataAttribute constructor.
     * @param Context $context
     * @param EmployeeFactory $employeeFactory
     */
    public function __construct(
        Context $context,
        EmployeeFactory $employeeFactory
    )
    {
        $this->employeeFactory = $employeeFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     * @throws \Exception
     */
    public function execute()
    {
        $atributeValue = (array)$this->getRequest()->getParams();

        $employee = $this->employeeFactory->create();
        if (!empty($atributeValue)) {
            $workingYears = $atributeValue['working_years'];
            $dob = $atributeValue['dob'];
            $salary = $atributeValue['salary'];
            $note = $atributeValue['note'];
            $firstName = $atributeValue['first_name'];
            $lastName = $atributeValue['last_name'];
            $email = $atributeValue['email'];
            $deparmentId = $atributeValue['department_id'];

            $employee->setData('first_name', $firstName)
                ->setData('last_name', $lastName)
                ->setData('email', $email)
                ->setData('department_id', $deparmentId)
                ->setData('dob_employee', $dob)
                ->setData('working_years', $workingYears)
                ->setData('salary', $salary)
                ->setData('note', $note);

            $saveData = $employee->save();

            if ($saveData) {
                $this->messageManager->addSuccess(__('Insert Record Successfully !'));
            }
            $this->_redirect('https://magento242.local/dtnemployee/form/index');
        }
    }
}