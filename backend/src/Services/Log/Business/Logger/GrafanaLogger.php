<?php

namespace Services\Log\Business\Logger;

use GuzzleHttp\Client;
use Services\H;
use Services\Log\LogConfig;
use Shared\Transfers\LogTransfer;

class GrafanaLogger implements LoggerInterface
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected Client $client;

    public function __construct(protected LogConfig $config)
    {
        $this->client = new Client([
            'base_uri' => $this->config->lokiBaseUrl(),
        ]);
    }

    /**
     * @param \Shared\Transfers\LogTransfer $logTransfer
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function log(LogTransfer $logTransfer): void
    {
        $response = $this->client->request('POST', $this->config->lokiLogUri(), [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'streams' => [
                    [
                        'stream' => [
                            'label' => 'value',
                        ],
                        'values' => [
                            [
                                sprintf('%d', H::nanotime()),
                                $logTransfer->getMessage(),
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }
}
