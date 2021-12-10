<?php

namespace App\Messages;

use App\Packets\PacketInterface;

class BasePacketMessage implements PacketMessageInterface
{
    protected string  $imei;
    protected string  $type;
    protected string  $time;
    protected string  $version;
    protected PacketInterface  $pac;

    public function getImei(): string
    {
        return $this->imei;
    }

    public function setImei(string $imei): self
    {
        $this->imei = $imei;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getPac(): PacketInterface
    {
        return $this->pac;
    }

    public function setPac(PacketInterface $pac): self
    {
        $this->pac = $pac;

        return $this;
    }
}