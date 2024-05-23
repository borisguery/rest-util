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
class Error implements ErrorInterface
{
    protected $httpStatusCode;
    protected $errorCode;
    protected $errorMessage;
    protected $errorExtendedMessage;
    protected $errorMoreInfoUrl;

    public function __construct(int $httpStatusCode, string $errorCode, string $errorMessage, $errorExtendedMessage = null,
        ?string $errorMoreInfoUrl = null)
    {
        $this->httpStatusCode = $httpStatusCode;
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
        $this->errorExtendedMessage = $errorExtendedMessage;
        $this->errorMoreInfoUrl = $errorMoreInfoUrl;
    }

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    public function getErrorMessage(): string
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

    public function toArray(): array
    {
        return [
            'http_status_code' => $this->getHttpStatusCode(),
            'code' => $this->getErrorCode(),
            'message' => $this->getErrorMessage(),
            'extended_message' => $this->getErrorExtendedMessage(),
            'more_info_url' => $this->getErrorMoreInfoUrl(),
        ];
    }
}
