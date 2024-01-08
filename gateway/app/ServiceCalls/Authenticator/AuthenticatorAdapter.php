<?php

namespace App\ServiceCalls\Authenticator;

use GuzzleHttp\Exception\GuzzleException;
use Mindwingx\ServiceCallAdapter\interfaces\ServiceCallAdapterInterface;
use Mindwingx\ServiceCallAdapter\interfaces\ServiceCallInterface;
use Psr\Http\Message\ResponseInterface;

class AuthenticatorAdapter implements ServiceCallAdapterInterface
{
    private AuthenticatorServiceCall $service;

    public function __construct()
    {
        /*
         * Note: you make multiple Service Call Classes and handle them here to
         * access by related condition or etc.
         */

        $this->service = new AuthenticatorServiceCall();
    }

    /**
     * @throws GuzzleException
     */
    public function call(array $payload = []): ResponseInterface|array
    {
        return $this->service->preparePayload($payload)->getResult();
    }
}
