<?php

namespace App\ServiceCalls\Messenger;

use GuzzleHttp\Exception\GuzzleException;
use Mindwingx\ServiceCallAdapter\handlers\ServiceCallHandler;
use Mindwingx\ServiceCallAdapter\helpers\Http;
use Psr\Http\Message\ResponseInterface;

class MessengerServiceCall extends ServiceCallHandler
{

    public function preparePayload(array $payload = []): self
    {
        $url = sprintf("%s/%s", config("custom.msg_service"), request()->route()->uri);
        $this->setUrl($url)
            ->setMethod(request()->method())
            ->setQuery()
            ->setHeaders(request()->header())
            ->setBody($payload);

        return $this;
    }

    /**
     * @throws GuzzleException
     */
    public function getResult(): ResponseInterface|array
    {
        return $this->sendRequest()
            ->getArrayResponse();
    }
}
