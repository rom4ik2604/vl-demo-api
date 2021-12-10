<?php

namespace App\Messages;

use App\Packets\PacketInterface;

interface PacketMessageInterface
{
    public function getPac(): PacketInterface;
}