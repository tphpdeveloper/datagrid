<?php
/**
 * @author    Igor <igorkutsan@ukr.net>
 * @copyright 2018
 * @license   https://opensource.org/licenses/MIT
 */

namespace Tphpdeveloper\Gridview\Datagrid;

use Illuminate\Http\Request;
use Tphpdeveloper\Gridview\Datagrid\Column;
use Tphpdeveloper\Gridview\Datagrid\Row;

class BuilderDataGrid
{


    /**
     * Eloquent collection Illuminate\Database\Eloquent\Builder
     * @var null
     */
    private $models = null;

    /**
     * Object \Tphpdeveloper\Gridview\Datagrid\Row
     * @var array
     */
    private $row = null;

    /**
     * @var Request|null
     */
    private $request = null;

    /**
     * BuilderDataGrid constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     *
     * @param Builder|LengthAwarePaginator $models
     * @param array $attributes
     * @return $this
     */
    public function setData($models)
    {
        $this->models = $models;
        $this->row = new Row();

        return $this;
    }

    /**
     * @param $name
     * @param array $attributes
     * @param null $callback
     * @return $this
     * @throws \Exception
     */
    public function setColumn($name, $attributes = [], $callback = null)
    {
        $column = new Column();
        $column->setName($name);

        if(key_exists('label', $attributes)){
            $column->setAlias($attributes['label']);
        }
        if(key_exists('sort', $attributes)){
            $column->setSort($attributes['sort']);
        }
        if(key_exists('filter', $attributes)){
            $column->setFilter($attributes['filter']);
        }
        if(key_exists('attributes', $attributes)){
            $column->setAttributes($attributes['attributes']);
        }
        if(is_callable($callback)){
            $column->setCallback($callback);
        }

        $this->row->setColumn($column);

        return $this;
    }

   /**
     * Array object Tphpdeveloper\Gridview\Datagrid\Row
     * @return mixed
     */
    public function getRow(){
        return $this->row;
    }

   /**
     * @return object
     */
    public function getModel(): object
    {
        return $this->models;
    }

    public function render(){
        return view('datagrid::grid')
            ->with('builder', $this)
            ->with('columns', $this->row->getColumns())
            ->with('request', $this->request)
            ->with('models', $this->models);
    }
}
