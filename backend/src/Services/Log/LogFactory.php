<?php

namespace Services\Log;

use Services\Log\Business\Logger\GrafanaLogger;
use Services\Log\Business\Logger\LoggerInterface;

class LogFactory
{
    public function __construct(protected LogConfig $config)
    {
    }

    /**
     * @return \Services\Log\Business\Logger\LoggerInterface
     */
    public function createGrafanaLogger(): LoggerInterface
    {
        return new GrafanaLogger($this->config);
    }
}
