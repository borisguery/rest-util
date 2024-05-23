<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error;

use Exception;
use Tbbc\RestUtil\Error\Exception\NotFoundExceptionMappingException;
use Tbbc\RestUtil\Error\Mapping\ExceptionMap;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
class ErrorResolver implements ErrorResolverInterface
{
    /**
     * @var ErrorFactoryInterface[]
     */
    protected array $errorFactories = [];
    protected ExceptionMap $map;

    public function __construct(ExceptionMap $map)
    {
        $this->map = $map;
    }

    public function resolve(Exception $exception): ?ErrorInterface
    {
        try {
            $mapping = $this->map->getMapping($exception);
            if (isset($this->errorFactories[$mapping->getErrorFactoryIdentifier()])) {
                return $this->errorFactories[$mapping->getErrorFactoryIdentifier()]->createError($exception, $mapping);
            }

            return null;
        } catch (NotFoundExceptionMappingException $e) {
            // Silently ignore non-mapped exception
        }

        return null;
    }

    public function registerFactory(ErrorFactoryInterface $errorFactory): void
    {
        $this->errorFactories[$errorFactory->getIdentifier()] = $errorFactory;
    }
}
