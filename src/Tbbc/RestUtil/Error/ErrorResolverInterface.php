<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error;

use Exception;

/**
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
interface ErrorResolverInterface
{
    /**
     * Takes an \Exception and converts it into an ErrorInterface.
     *
     * @return ErrorInterface|null Returns null if no error factory supports the given exception
     */
    public function resolve(Exception $exception): ?ErrorInterface;
}
