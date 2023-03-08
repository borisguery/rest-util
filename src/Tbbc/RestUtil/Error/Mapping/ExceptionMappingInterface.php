<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error\Mapping;

/**
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
interface ExceptionMappingInterface
{
    /**
     * Exception full qualified class name that
     * is handled by this factory
     *
     * @return string
     */
    public function getExceptionClassName(): string;

    /**
     * Factory unique identifier
     *
     * @return string
     */
    public function getErrorFactoryIdentifier(): string;

    /**
     * Returns Http Status Code that should be mapped
     * to this Exception
     *
     * @return int
     */
    public function getHttpStatusCode(): int;

    /**
     * Returns the Error::errorCode that should be mapped
     * to this Exception
     *
     * @return string
     */
    public function getErrorCode(): string;

    /**
     * Returns a short message describing the error
     *
     * @return string
     */
    public function getErrorMessage(): ?string;

    /**
     * Returns a more extended message for giving detailed
     * information about the Error
     *
     * @return mixed
     */
    public function getErrorExtendedMessage();

    /**
     * Returns an URL for getting more information about the
     * Error
     *
     * @return string
     */
    public function getErrorMoreInfoUrl(): ?string;
}
