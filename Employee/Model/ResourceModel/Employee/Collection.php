<?php

declare(strict_types=1);

namespace Dtn\Employee\Model\ResourceModel\Employee;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Dtn\Employee\Model\Employee','Dtn\Employee\Model\ResourceModel\Employee');
    }
}