<?php

declare(strict_types=1);

namespace Dtn\Employee\Model;

class Employee extends \Magento\Framework\Model\AbstractModel
{
    const ENTITY = 'dtn_office_employee';

    public function _construct()
    {
        $this->_init('Dtn\Employee\Model\ResourceModel\Employee');
    }
}