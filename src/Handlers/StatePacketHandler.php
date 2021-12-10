<?php

namespace App\Handlers;

use App\Messages\StatePacketMessage;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class StatePacketHandler extends BaseHandler implements MessageHandlerInterface
{
    #[NoReturn]
    public function __invoke(StatePacketMessage $message)
    {
        $this->logger->notice(sprintf(
            "\nІдентифікатор термінала: \t%s\nТип пакету: \t\t\t%s\nЧас формування пакету: \t\t%s\nВерсія протоколу: \t\t%s\n",
            $message->getImei(),
            $message->getType(),
            $message->getTime(),
            $message->getVersion(),
        ));
    }
}