<?php

namespace App\Command;

use PhpMqtt\Client\Exceptions\ConfigurationInvalidException;
use PhpMqtt\Client\Exceptions\ConnectingToBrokerFailedException;
use PhpMqtt\Client\Exceptions\DataTransferException;
use PhpMqtt\Client\Exceptions\ProtocolNotSupportedException;
use PhpMqtt\Client\Exceptions\RepositoryException;
use PhpMqtt\Client\Contracts\MqttClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MqttProduceCommand extends Command
{
    protected static $defaultName = 'mqtt:produce';
    protected static $defaultDescription = 'Add a short description for your command';

    public function __construct(private MqttClient $client, string $name = null)
    {
        parent::__construct($name);
    }

    /**
     * @throws ConfigurationInvalidException
     * @throws ConnectingToBrokerFailedException
     * @throws RepositoryException
     * @throws ProtocolNotSupportedException
     * @throws DataTransferException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if (!$this->client->isConnected()) {
            $this->client->connect();
        }

        $statePacket = [
            "imei" => "862643034067094",
            "type" => "S",
            "time" => "1566199266",
            "version" => "2.1",
            "pac" => [
                "workStatus" => [
                    "CenBoard" => "7",
                    "validState" => "0",
                    "cashless" => "0"
                ],
                "device" => [
                    [
                        "type" => "WM",
                        "number" => "1",
                        "rssi" => "-60",
                        "state" => "7",
                        "money" => "50",
                        "mode" => "1",
                        "temp" => "1",
                        "extrac" => "1",
                        "price" => "18",
                        "total_cash_dev" => "360",
                        "button" => "1",
                        "checkLEDDoor" => "1",
                        "display" => "2H"
                    ],
                    [
                        "type" => "WM",
                        "number" => "2",
                        "rssi" => "-60",
                        "state" => "7",
                        "money" => "50",
                        "mode" => "1",
                        "temp" => "1",
                        "extrac" => "1",
                        "price" => "18",
                        "total_cash_dev" => "560",
                        "button" => "1",
                        "checkLEDDoor" => "1",
                        "display" => "2H"
                    ]
                ]
            ]
        ];

        $initPacket = [
            "imei" => "862643034067094",
            "type" => "I",
            "time" => "1566199266",
            "version" => "2.1",
            "pac" => [
                "firmware" => "2.50",
                "bootloader" => "2.134",
                "radio" => "1.35",
                "channel" => "25",
                "PCB" => "8.0",
                "telephone" => "380679951304",
                "rssi" => "-70",
                "modemCash" => "60.00",
                "traffic" => "590.000",
                "posId" => "1234567"
            ]
        ];

        $this->client->publish('topic', json_encode($statePacket));

        return 0;
    }
}
