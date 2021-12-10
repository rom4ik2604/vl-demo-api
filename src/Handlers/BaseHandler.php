<?php

namespace App\Handlers;

use Psr\Log\LoggerInterface;

class BaseHandler
{
    public function __construct(protected LoggerInterface $logger)
    {
    }
}