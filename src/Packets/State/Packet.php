<?php

namespace App\Packets\State;

use App\Packets\PacketInterface;

class Packet implements PacketInterface
{
    private WorkStatus $workStatus;

    /**
     * @var Device[]
     */
    private array $device;

    public function getWorkStatus(): WorkStatus
    {
        return $this->workStatus;
    }

    public function setWorkStatus(WorkStatus $workStatus): Packet
    {
        $this->workStatus = $workStatus;

        return $this;
    }

    public function getDevice(): array
    {
        return $this->device;
    }

    public function setDevice(array $device): Packet
    {
        $this->device = $device;

        return $this;
    }
}