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
        $this->errorCode      = $errorCode;
        $this->errorMessage   = $errorMessage;
        $this->errorExtendedMessage = $errorExtendedMessage;
        $this->errorMoreInfoUrl = $errorMoreInfoUrl;
    }

    /**
     * {@inheritDoc}
     */
    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    /**
     * {@inheritDoc}
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    /**
     * {@inheritDoc}
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * {@inheritDoc}
     */
    public function getErrorExtendedMessage(): mixed
    {
        return $this->errorExtendedMessage;
    }

    /**
     * {@inheritDoc}
     */
    public function getErrorMoreInfoUrl(): ?string
    {
        return $this->errorMoreInfoUrl;
    }

    /**
     * @return array
     */
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
