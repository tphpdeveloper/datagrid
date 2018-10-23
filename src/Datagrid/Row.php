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
        $this->columns[] = $column;
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
     * Check if need filter for search
     * @return bool
     */
    public function hasFilter(){
        $exist = false;
        if(count($this->columns)){
            foreach($this->columns as $column){
                if($column->hasFilter()){
                    $exist = true;
                }
            }
        }

        return $exist;
    }

    /**
     * Check if in row need filter functional
     * @return bool
     */
    public function hasSort(){
        $exist = false;
        if(count($this->columns)){
            foreach($this->columns as $column){
                if($column->hasSort()){
                    $exist = true;
                }
            }
        }

        return $exist;
    }
}
