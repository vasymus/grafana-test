<?php

namespace Services\Log;

use Shared\Transfers\LogTransfer;

interface LogFacadeInterface
{
    /**
     * @param \Shared\Transfers\LogTransfer $logTransfer
     *
     * @return void
     */
    public function log(LogTransfer $logTransfer): void;
}
