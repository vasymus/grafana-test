<?php

namespace Services;

use Services\Log\LogFacade;
use Services\Log\LogFacadeInterface;
use Shared\Transfers\LogTransfer;

class H
{
    /**
     * @var \Services\Log\LogFacadeInterface|null
     */
    protected static ?Log\LogFacadeInterface $logFacade;

    /**
     * @return int
     */
    public static function nanotime()
    {
        ob_start();
        $nanotime = system('date +%s%N', $result_code);
        ob_clean();
        if ($result_code !== 0) {
            return (int)floor(microtime(true) * 1000000000);
        }

        return (int)$nanotime;
    }

    /**
     * @param string $message
     *
     * @return void
     */
    public static function log(string $message): void
    {
        static::getLogFacade()->log((new LogTransfer())->setMessage($message));
    }

    /**
     * @return \Services\Log\LogFacadeInterface
     */
    protected static function getLogFacade(): LogFacadeInterface
    {
        if (isset(static::$logFacade)) {
            return static::$logFacade;
        }

        static::$logFacade = new LogFacade();

        return static::$logFacade;
    }
}
