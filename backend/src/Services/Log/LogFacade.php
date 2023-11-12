<?php

namespace Services\Log;

use Shared\Transfers\LogTransfer;

class LogFacade implements LogFacadeInterface
{
    /**
     * @var \Services\Log\LogFactory
     */
    protected LogFactory $factory;

    public function __construct()
    {
        $this->factory = new LogFactory(
            new LogConfig()
        );
    }

    /**
     * @param \Shared\Transfers\LogTransfer $logTransfer
     *
     * @return void
     */
    public function log(LogTransfer $logTransfer): void
    {
        $this->factory
            ->createGrafanaLogger()
            ->log($logTransfer);
    }
}
