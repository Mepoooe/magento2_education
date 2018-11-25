<?php
namespace Mikhail\StarWars\Setup;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (!$installer->tableExists('mikhail_starwars_film')) {
            //START table setup
            $table = $installer->getConnection()->newTable(
                $installer->getTable('mikhail_starwars_film')
            )->addColumn(
                'film_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true,],
                'Entity ID'
            )->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false,],
                'Demo Title'
            )->addColumn(
                'creation_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT,],
                'Creation Time'
            )->addColumn(
                'update_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE,],
                'Modification Time'
            )->addColumn(
                'opening_crawl',
                \Magento\Framework\DB\Ddl\Table::TYPE_BLOB,
                null,
                [ 'nullable' => false ],
                'Opening Crawl'
            )->addColumn(
                'director',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [ 'nullable' => false ],
                'Director'
            )->addColumn(
                'year',
                \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
                null,
                [ 'nullable' => false ],
                'Director'
            );
            $installer->getConnection()->createTable($table);
        }

        $installer->endSetup();
    }
}
