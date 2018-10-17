<?php
/**
 * @author    Igor <igorkutsan@ukr.net>
 * @copyright 2018
 * @license   https://opensource.org/licenses/MIT
 */

namespace Tphpdeveloper\Gridview\Datagrid;

use Illuminate\Support\Facades\Facade;

class Datagrid extends Facade
{

    protected static function getFacadeAccessor(){
        return 'datagrid';
    }
}
