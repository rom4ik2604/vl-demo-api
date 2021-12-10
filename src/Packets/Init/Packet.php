<?php

namespace App\Packets\Init;

use App\Packets\PacketInterface;

class Packet implements PacketInterface
{
    private string $firmware;
    private string $bootloader;
    private string $radio;
    private string $channel;
    private string $pcb;
    private string $telephone;
    private string $rssi;
    private string $modemCash;
    private string $traffic;
    private string $posId;

    public function getFirmware(): string
    {
        return $this->firmware;
    }

    public function setFirmware(string $firmware): Packet
    {
        $this->firmware = $firmware;

        return $this;
    }

    public function getBootloader(): string
    {
        return $this->bootloader;
    }

    public function setBootloader(string $bootloader): Packet
    {
        $this->bootloader = $bootloader;

        return $this;
    }

    public function getRadio(): string
    {
        return $this->radio;
    }

    public function setRadio(string $radio): Packet
    {
        $this->radio = $radio;

        return $this;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function setChannel(string $channel): Packet
    {
        $this->channel = $channel;

        return $this;
    }

    public function getPcb(): string
    {
        return $this->pcb;
    }

    public function setPcb(string $pcb): Packet
    {
        $this->pcb = $pcb;

        return $this;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): Packet
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getRssi(): string
    {
        return $this->rssi;
    }

    public function setRssi(string $rssi): Packet
    {
        $this->rssi = $rssi;

        return $this;
    }

    public function getModemCash(): string
    {
        return $this->modemCash;
    }

    public function setModemCash(string $modemCash): Packet
    {
        $this->modemCash = $modemCash;

        return $this;
    }

    public function getTraffic(): string
    {
        return $this->traffic;
    }

    public function setTraffic(string $traffic): Packet
    {
        $this->traffic = $traffic;

        return $this;
    }

    public function getPosId(): string
    {
        return $this->posId;
    }

    public function setPosId(string $posId): Packet
    {
        $this->posId = $posId;

        return $this;
    }
}