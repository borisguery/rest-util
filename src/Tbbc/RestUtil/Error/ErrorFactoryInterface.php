<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error;

use Exception;
use Tbbc\RestUtil\Error\Mapping\ExceptionMappingInterface;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
interface ErrorFactoryInterface
{
    /**
     * Returns an unique identifier for this error factory.
     */
    public function getIdentifier(): string;

    /**
     * Returns the Error created from the given Exception.
     */
    public function createError(Exception $exception, ExceptionMappingInterface $mapping): ?ErrorInterface;
}
