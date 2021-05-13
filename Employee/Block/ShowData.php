<?php

declare(strict_types=1);

namespace Dtn\Employee\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Dtn\Employee\Model\ResourceModel\Employee\CollectionFactory;
use Dtn\Employee\Model\EmployeeFactory;

class ShowData extends Template
{
    /**
     * @var CollectionFactory
     */
    public $collection;

    /**
     * @var EmployeeFactory
     */
    protected $model;

    /**
     * ShowData constructor.
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param EmployeeFactory $employeeFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        EmployeeFactory $employeeFactory,
        array $data = []
    )
    {
        $this->model = $employeeFactory;
        $this->collection = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return collection
     */
    public function getCollection()
    {
        return $this->collection->create();
    }
}