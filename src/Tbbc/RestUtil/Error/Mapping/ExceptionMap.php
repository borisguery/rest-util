<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error\Mapping;

use Tbbc\RestUtil\Error\Exception\NotFoundExceptionMappingException;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class ExceptionMap implements \Iterator
{
    /**
     * @var ExceptionMapping[]
     */
    private $map;

    public function add(ExceptionMapping $mapping)
    {
        $this->map[$mapping->getExceptionClassName()] = $mapping;
    }

    public function merge(ExceptionMap $map)
    {
        foreach ($map as $mapping) {
            $this->add($mapping);
        }
    }

    public function getMapping(\Exception $exception)
    {
        foreach ($this->map as $mapping) {
            if (get_class($exception) === $mapping->getExceptionClassName()) {

                return $mapping;
            }
        }

        throw new NotFoundExceptionMappingException();
    }

    public function current(): mixed
    {
        return current($this->map);
    }

    public function next(): void
    {
        next($this->map);
    }

    public function key(): mixed
    {
        return key($this->map);
    }

    public function valid(): bool
    {
        return (bool) key($this->map);
    }

    public function rewind(): void
    {
        rewind($this->map);
    }
}
