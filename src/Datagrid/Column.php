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
     * @var string
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
    public function __construct(string $name, string $alias = '', bool $sort = false, bool $filter = false, array $attributes = [], string $collback = '')
    {
        $this->name = $name;
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
        return $this->alias;
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
    public function isSort(): bool
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
    public function isFilter(): bool
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
     * @param array $attributes
     */
    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * @return function anonimous
     */
    public function getCollback(): string
    {
        return $this->collback;
    }

    /**
     * @param function $collback
     */
    public function setCollback($collback): void
    {
        $this->collback = $collback;
    }





}
