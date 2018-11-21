<?php
/**
 * @author    Igor <igorkutsan@ukr.net>
 * @copyright 2018
 * @license   https://opensource.org/licenses/MIT
 */

namespace Tphpdeveloper\Gridview\Datagrid;

class Column
{

    /**
     * Name column
     * @var string
     */
    private $name = '';

    /**
     * Alias name column
     * @var string
     */
    private $alias = '';

    /**
     * Sort column. Default false
     * @var bool
     */
    private $sort = false;

    /**
     * Filter column. Default false
     * @var bool
     */
    private $filter = false;

    /**
     * Attributes for column.
     * @var array
     */
    private $attributes = [];

    /**
     * Anonimous function
     * @var function
     */
    private $callback = null;

    /**
     * If has callable function
     * @var bool
     */
    private $callable = false;

    /**
     * If column mast be counter
     * @var bool
     */
    private $counter = false;

    /**
     * Column constructor.
     * @param string $name
     * @param string $alias
     * @param bool $sort
     * @param bool $filter
     * @param array $attributes
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): object
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        $name = '';
        if($this->alias != '') {
            $name = $this->alias;
        }
        elseif($this->name != '') {
            $name = $this->name;
        }
        if($name != '') {
            $name = mb_strtoupper($name);
            $first = mb_substr($name, 0, 1);
            $last = mb_strtolower(mb_substr($name, 1));
            $name = $first . $last;
        }

        return $name;
    }

    /**
     * @param string $alias
     */
    public function setAlias(string $alias): object
    {
        $this->alias = $alias;
        if($alias == '#'){
            $this->counter = true;
        }
        return $this;
    }

    /**
     * @return bool
     */
    public function hasSort(): bool
    {
        return $this->sort;
    }

    /**
     * @param bool $sort
     */
    public function setSort(bool $sort): object
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasFilter(): bool
    {
        return $this->filter;
    }

    /**
     * @param bool $filter
     */
    public function setFilter(bool $filter): object
    {
        $this->filter = $filter;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @return array
     */
    public function getStringAttributes(): string
    {
        $attribute = '';
        if(count($this->attributes)){
            foreach($this->attributes as $name => $attribute_value){
                $attribute .= $name.'="'.$attribute_value.'" ';
            }
        }

        return $attribute;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes): object
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @param param for function $param
     * @return string
     */
    public function getCallback($param): string
    {
        if(is_callable($this->callback)) {
            return call_user_func($this->callback, $param);
        }
        return $this->collback;
    }

    /**
     * @param function $collback
     */
    public function setCallback($callback): object
    {
        $this->callable = true;
        $this->callback = $callback;
        return $this;
    }

    /**
     * @param bool $collable
     */
    public function setCallable(bool $callable = false): object
    {
        $this->callable = $callable;
        return $this;
    }

    /**
     * If column has callable, default = false
     *
     * @return bool
     */
    public function isCallable(): bool
    {
        return $this->callable;
    }

    /**
     * If column counter, default = false
     * @return bool
     */
    public function isCounter(): bool
    {
        return $this->counter;
    }



}
