<?php

namespace App\Packets\State;

class WorkStatus
{
    private string $cenBoard;
    private string $validState;
    private string $cashless;

    public function getCenBoard(): string
    {
        return $this->cenBoard;
    }

    public function setCenBoard(string $cenBoard): WorkStatus
    {
        $this->cenBoard = $cenBoard;

        return $this;
    }

    public function getValidState(): string
    {
        return $this->validState;
    }

    public function setValidState(string $validState): WorkStatus
    {
        $this->validState = $validState;

        return $this;
    }

    public function getCashless(): string
    {
        return $this->cashless;
    }

    public function setCashless(string $cashless): WorkStatus
    {
        $this->cashless = $cashless;

        return $this;
    }
}