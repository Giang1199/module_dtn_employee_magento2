<?php

namespace Dtn\Employee\Model\ResourceModel;

use Magento\Eav\Model\Entity\AbstractEntity;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Employee extends AbstractDb
{
//    /**
//     * @return \Magento\Eav\Model\Entity\Type
//     * @throws \Magento\Framework\Exception\LocalizedException
//     */
//    public function getEntityType()
//    {
//        if (empty($this->_type)) {
//            $this->setType(\Dtn\Employee\Model\Employee::ENTITY);
//        }
//        return parent::getEntityType();
//    }
    protected function _construct()
    {
        $this->_init('dtn_office_employee_entity', 'entity_id');
    }
}