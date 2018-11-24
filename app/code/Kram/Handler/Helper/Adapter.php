<?php
/**
 * Created by PhpStorm.
 * User: PC-misha
 * Date: 16.11.2018
 * Time: 18:07
 */

namespace Kram\Handler\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Adapter  extends AbstractHelper implements DataInterface
{
    public function snakeToCamel($snake)
    {
        return 'ssss';
    }

    public function getHttpBody()
    {
        return 'some logic';
    }
}