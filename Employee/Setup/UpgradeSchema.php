<?php

namespace Dtn\Employee\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $quoteTable = 'quote';
        $orderTable = 'sales_order';
        //Quote table
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($quoteTable),
                'special_request',
                [
                    'type' => \Magento\Framework\DB\DdDtn\Employee\Model\EmployeeFactoryl\Table::TYPE_TEXT,
                    'length' => '255',
                    'nullable' => true,
                    'comment' => 'Special Request'
                ]
            );
        //Order table
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($orderTable),
                'special_request',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => '255',
                    'nullable' => true,
                    'comment' => 'Special Request'
                ]
            );
        $setup->endSetup();
    }
}