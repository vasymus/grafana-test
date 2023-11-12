<?php

namespace Services\Log;

class LogConfig
{
    /**
     * @return string
     */
    public function lokiBaseUrl(): string
    {
        return $_ENV['LOKI_URL'] ?? '';
    }

    /**
     * @return string
     */
    public function lokiLogUri(): string
    {
        return $_ENV['LOKI_LOG_URI'] ?? '';
    }
}
