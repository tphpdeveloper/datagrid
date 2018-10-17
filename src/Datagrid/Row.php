<?php
/**
 * @author    Igor <igorkutsan@ukr.net>
 * @copyright 2018
 * @license   https://opensource.org/licenses/MIT
 */

namespace Tphpdeveloper\Gridview\Datagrid;

use Tphpdeveloper\Gridview\Datagrid\Column;

class Row
{

    /**
     * Table columns
     * @var array
     */
    private $columns = [];

    /**
     * Table row attributes
     * @var array
     */
    private $attributes = [];

    /**
     * Returns an array of column objects
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * Writes an array of column objects
     * @return array
     */
    public function setColumns(array $columns): void
    {
        if(count($this->columns)){
            $this->columns += $columns;
        }
        else {
            $this->columns = $columns;
        }
    }

    /**
     * Writes a column object to a column array.
     * @param \Tphpdeveloper\Gridview\Datagrid\Column $column
     */
    public function setColumn(Column $column): void
    {
        if(!isset($this->columns[$column->getName()])) {
            $this->columns[$column->getName()] = $column;
        }
        throw new \Exception('name of column exist!!!');
    }

    /**
     * Returns a column object by name.
     * @param string $name
     * @return object
     */
    public function getColumn(string $name): object
    {
        return isset($this->columns[$name]) ? $this->columns[$name] : null;
    }

    /**
     * Return a row attributes
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

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
}
