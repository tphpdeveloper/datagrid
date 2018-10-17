<?php
/**
 * @author    Igor <igorkutsan@ukr.net>
 * @copyright 2018
 * @license   https://opensource.org/licenses/MIT
 */

namespace Tphpdeveloper\Gridview\Datagrid;

use Illuminate\Database\Eloquent\Model;
use Tphpdeveloper\Gridview\Datagrid\Column;
use Tphpdeveloper\Gridview\Datagrid\Row;

class BuilderDataGrid
{

    /**
     * Table attributes
     * @var array
     */
    private $attributes = [];

    /**
     * Eloquent collection
     * @var null
     */
    private $models = null;

    /**
     * Object \Tphpdeveloper\Gridview\Datagrid\Row
     * @var array
     */
    private $row = null;

    /**
     *
     * @param Model $models
     * @param array $attributes
     * @return $this
     */
    public function setData(Model $models, array $attributes = [])
    {
        $this->models = $models->paginate(10);
        $this->attributes = $attributes;
        $this->row = new Row();

        return $this;
    }

    /**
     * @param $name
     * @param array $attributes
     * @param null $collback
     * @return $this
     * @throws \Exception
     */
    public function setColumn($name, $attributes = [], $collback = null)
    {
        $column = new Column($name);
        if(in_array('label', $attributes)){
            $column->setAlias($attributes['label']);
        }
        if(in_array('sort', $attributes)){
            $column->setSort($attributes['sort']);
        }
        if(in_array('filter', $attributes)){
            $column->setFilter($attributes['filter']);
        }
        if(in_array('attributes', $attributes)){
            $column->setAttributes($attributes['attributes']);
        }
        if(!is_null($collback)){
            $column->setCollback($collback);
        }

        $this->row->setColumn($column);
        if(in_array('tr', $attributes)){
            $this->row->setAttributes($attributes['tr']);
        }

        return $this;
    }

    /**
     * Return array table attributes
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Returned string table attributes
     * @return string
     */
    public function getStringAttributes(): string
    {
        $string = '';
        $attributes = [];
        if(count($this->attributes)){
            foreach($this->attributes as $key => $value) {
                $attributes[] = $key . '="' . $value . '"';
            }
            return implode(' ', $attributes);
        }
        return $string;
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
        return view('datagrid::resources.view.grid')->with('builder', $this);
    }
}
