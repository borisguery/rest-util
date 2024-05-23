<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error\Mapping;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
class ExceptionMapping implements ExceptionMappingInterface
{
    private $exceptionClassName;
    private $errorFactoryIdentifier;
    private $httpStatusCode;
    private $errorCode;
    private $errorMessage;
    private $errorExtendedMessage;
    private $errorMoreInfoUrl;

    public function __construct(array $mapping)
    {
        $this->exceptionClassName = $mapping['exceptionClassName'];
        $this->errorFactoryIdentifier = $mapping['factory'];
        $this->httpStatusCode = (int) $mapping['httpStatusCode'];
        $this->errorCode = (string) $mapping['errorCode'];
        $this->errorMessage = $mapping['errorMessage'];
        $this->errorExtendedMessage = $mapping['errorExtendedMessage'];
        $this->errorMoreInfoUrl = $mapping['errorMoreInfoUrl'];
    }

    public function getExceptionClassName(): string
    {
        return $this->exceptionClassName;
    }

    public function getErrorFactoryIdentifier(): string
    {
        return $this->errorFactoryIdentifier;
    }

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function getErrorExtendedMessage(): mixed
    {
        return $this->errorExtendedMessage;
    }

    public function getErrorMoreInfoUrl(): ?string
    {
        return $this->errorMoreInfoUrl;
    }
}
