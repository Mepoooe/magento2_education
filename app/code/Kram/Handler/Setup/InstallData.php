<?php

namespace Kram\Handler\Setup;
class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    public function install(\Magento\Framework\Setup\ModuleDataSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $installer->getConnection()
            ->insert(
                $installer->getTable('handler_film'),
                [
                    'title' => 'New Hope',
                    'director' => 'Lucas',
                ]
            );

        $installer->endSetup();
    }
}
