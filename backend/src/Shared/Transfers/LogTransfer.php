<?php

namespace Shared\Transfers;

class LogTransfer
{
    /**
     * @var string|null
     */
    protected ?string $message;

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     *
     * @return $this
     */
    public function setMessage(?string $message): LogTransfer
    {
        $this->message = $message;
        return $this;
    }
}
