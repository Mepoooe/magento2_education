<?php
namespace Mikhail\StarWars\Setup;
/**
 * The MIT License (MIT)
 * Copyright (c) 2015 - 2018 Pulse Storm LLC, Alan Storm
 * 
 * Permission is hereby granted, free of charge, to any person obtaining 
 * a copy of this software and associated documentation files (the 
 * "Software"), to deal in the Software without restriction, including 
 * without limitation the rights to use, copy, modify, merge, publish, 
 * distribute, sublicense, and/or sell copies of the Software, and to 
 * permit persons to whom the Software is furnished to do so, subject to 
 * the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included 
 * in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS 
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF 
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. 
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY 
 * CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT 
 * OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR 
 * THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema implements UpgradeSchemaInterface
{
    
    protected $scriptHelper;    
    public function __construct(
        \Mikhail\StarWars\Setup\Scripts $scriptHelper
    )
    {
        $this->scriptHelper = $scriptHelper;
    }        

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        SchemaSetupInterface $setup, 
        ModuleContextInterface $context
    )
    {
        $installer = $setup;

        $installer->startSetup();

//        if(version_compare($context->getVersion(), '0.0.1', '<')) {
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
//        }


        $installer->endSetup();
    }      
}