<?php

namespace App\Messages;

use App\Packets\Init\Packet;
use App\Packets\PacketInterface;

class InitPacketMessage extends BasePacketMessage
{
    /** @var Packet  */
    protected PacketInterface $pac;
}