<?php

declare(strict_types=1);

namespace Dtn\Employee\Controller\Adminhtml\Employee;

use Dtn\Employee\Model\EmployeeFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Dtn\Employee\Model\ResourceModel\Employee\CollectionFactory;

class Delete extends Action
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var EmployeeFactory
     */
    protected $employeeFactory;

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * Delete constructor.
     * @param CollectionFactory $collectionFactory
     * @param EmployeeFactory $employeeFactory
     * @param Filter $filter
     * @param Context $context
     */
    public function __construct
    (
        CollectionFactory $collectionFactory,
        EmployeeFactory $employeeFactory,
        Filter $filter,
        Context $context
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->filter = $filter;
        $this->employeeFactory = $employeeFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        $collectFilter = $this->filter->getCollection($this->collectionFactory->create());
        $total = 0;
        $err = 0;
        $model = $this->employeeFactory->create();
        foreach ($collectFilter->getItems() as $item) {
            $deleteId = $model->load($item->getData('entity_id'));
            try {
                $model->delete();
                $total++;
            } catch (\Exception $exception) {
                $err++;
            }
        }

        if ($total) {
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $total)
            );
        }

        if ($err) {
            $this->messageManager->addErrorMessage(
                __(
                    'A total of %1 record(s) haven\'t been deleted. Please see server logs for more details.',
                    $err
                )
            );
        }
        return $this->_redirect('employee/employee/index');
    }
}