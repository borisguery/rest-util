<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
interface ErrorInterface
{
    /**
     * Returns the corresponding HTTP Status Code
     * for this Error.
     */
    public function getHttpStatusCode(): int;

    /**
     * Returns the error code that should be appended
     * to the Http Status Code.
     */
    public function getErrorCode(): string;

    /**
     * Returns a short message describing the Error.
     */
    public function getErrorMessage(): string;

    /**
     * Returns an extended message for giving detailed
     * information about the Error.
     */
    public function getErrorExtendedMessage(): mixed;

    /**
     * Returns an URL to get more information about the
     * Error.
     *
     * @return ?string
     */
    public function getErrorMoreInfoUrl(): ?string;

    /**
     * Returns a normalized array version of the Error.
     */
    public function toArray(): array;
}
