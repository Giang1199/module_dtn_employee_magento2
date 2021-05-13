<?php

namespace Dtn\Employee\Model;

class Department extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Dtn\Employee\Model\ResourceModel\Department');
    }
}