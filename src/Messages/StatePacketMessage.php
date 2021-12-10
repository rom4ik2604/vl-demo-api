<?php

namespace App\Messages;

use App\Packets\PacketInterface;
use App\Packets\State\Packet;

class StatePacketMessage extends BasePacketMessage
{
    /** @var Packet  */
    protected PacketInterface $pac;
}