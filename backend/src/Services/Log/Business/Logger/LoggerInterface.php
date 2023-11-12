<?php

namespace Services\Log\Business\Logger;

use Shared\Transfers\LogTransfer;

interface LoggerInterface
{
    /**
     * @param \Shared\Transfers\LogTransfer $logTransfer
     *
     * @return void
     */
    public function log(LogTransfer $logTransfer): void;
}
