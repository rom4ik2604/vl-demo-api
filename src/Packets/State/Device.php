<?php

namespace App\Packets\State;

class Device
{
    private string $type;
    private string $number;
    private string $rssi;
    private string $state;
    private string $money;
    private string $mode;
    private string $temp;
    private string $extrac;
    private string $price;
    private string $totalCashDev;
    private string $button;
    private string $checkLEDDoor;
    private string $display;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Device
    {
        $this->type = $type;

        return $this;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): Device
    {
        $this->number = $number;

        return $this;
    }

    public function getRssi(): string
    {
        return $this->rssi;
    }

    public function setRssi(string $rssi): Device
    {
        $this->rssi = $rssi;

        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): Device
    {
        $this->state = $state;

        return $this;
    }

    public function getMoney(): string
    {
        return $this->money;
    }

    public function setMoney(string $money): Device
    {
        $this->money = $money;

        return $this;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function setMode(string $mode): Device
    {
        $this->mode = $mode;

        return $this;
    }

    public function getTemp(): string
    {
        return $this->temp;
    }

    public function setTemp(string $temp): Device
    {
        $this->temp = $temp;

        return $this;
    }

    public function getExtrac(): string
    {
        return $this->extrac;
    }

    public function setExtrac(string $extrac): Device
    {
        $this->extrac = $extrac;

        return $this;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): Device
    {
        $this->price = $price;

        return $this;
    }

    public function getTotalCashDev(): string
    {
        return $this->totalCashDev;
    }

    public function setTotalCashDev(string $totalCashDev): Device
    {
        $this->totalCashDev = $totalCashDev;

        return $this;
    }

    public function getButton(): string
    {
        return $this->button;
    }

    public function setButton(string $button): Device
    {
        $this->button = $button;

        return $this;
    }

    public function getCheckLEDDoor(): string
    {
        return $this->checkLEDDoor;
    }

    public function setCheckLEDDoor(string $checkLEDDoor): Device
    {
        $this->checkLEDDoor = $checkLEDDoor;

        return $this;
    }

    public function getDisplay(): string
    {
        return $this->display;
    }

    public function setDisplay(string $display): Device
    {
        $this->display = $display;

        return $this;
    }
}