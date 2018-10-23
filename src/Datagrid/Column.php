<?php
/**
 * @author    Igor <igorkutsan@ukr.net>
 * @copyright 2018
 * @license   https://opensource.org/licenses/MIT
 */

namespace Tphpdeveloper\Gridview\Datagrid;

class Column
{
    const COLUMN_COUNTER = 'counter';

    const COLUMN_CALLBACK = 'collback';

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
    private $collback = null;

    /**
     * Column constructor.
     * @param string $name
     * @param string $alias
     * @param bool $sort
     * @param bool $filter
     * @param array $attributes
     */
    public function __construct(string $name, string $alias = '', bool $sort = false, bool $filter = false, array $attributes = [], $collback = null)
    {
        if($name == '' && !is_callable($collback) ){
            $this->name = self::COLUMN_COUNTER;
        }
        elseif($name == '' && is_callable($collback) ){
            $this->name = self::COLUMN_CALLBACK;
        }
        else{
            $this->name = $name;
        }
        $this->alias = $alias;
        $this->sort = $sort;
        $this->filter = $filter;
        $this->attributes = $attributes;
        $this->collback = $collback;
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
    public function setName(string $name): void
    {
        $this->name = $name;
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
        else{
            $name = $this->name;
        }
        $name = mb_strtoupper($name);
        $first = mb_substr($name, 0, 1);
        $last =  mb_strtolower(mb_substr($name, 1));

        if($this->name == self::COLUMN_CALLBACK){
            return '';
        }

        return $first.$last;
    }

    /**
     * @param string $alias
     */
    public function setAlias(string $alias): void
    {
        $this->alias = $alias;
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
    public function setSort(bool $sort): void
    {
        $this->sort = $sort;
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
    public function setFilter(bool $filter): void
    {
        $this->filter = $filter;
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
            return $attribute;
        }

        return $attribute;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * @param param for function $param
     * @return string
     */
    public function getCollback($param): string
    {
        if(is_callable($this->collback)) {
            return call_user_func($this->collback, $param);
        }
        return $this->collback;
    }

    /**
     * @param function $collback
     */
    public function setCollback($collback): void
    {
        $this->name = self::COLUMN_CALLBACK;
        $this->attributes = [
            'class' => 'd-flex flex-nowrap justify-content-end'
        ];
        $this->collback = $collback;
    }





}
