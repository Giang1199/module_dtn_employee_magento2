<?php

namespace Dtn\Employee\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $employeeFactory;
    /**
     * UpgradeData constructor.
     * @param \Dtn\Employee\Model\EmployeeFactory $employeeFactory
     */
    public function __construct(
        \Dtn\Employee\Model\EmployeeFactory $employeeFactory
    )
    {
        $this->employeeFactory = $employeeFactory;
    }
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
       $employee = $this->employeeFactory->create();

       $employee->setData('working_years',3);
       $employee->setData('dob','1983-03-28');
       $employee->setData('salary',3800.00);
       $employee->setData('taxvat','GB123456789');
       $employee->setData('note','Just some notes about John');
       $employee->save();
    }
}