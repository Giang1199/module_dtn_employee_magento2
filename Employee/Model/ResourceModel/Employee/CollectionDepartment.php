<?php

namespace Dtn\Employee\Model\ResourceModel\Collection;

class CollectionDepartment extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Dtn\Employee\Model\Department', 'Dtn\Employee\Model\ResourceModel\Department');
    }
}