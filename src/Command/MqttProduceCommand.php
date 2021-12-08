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

        $this->client->publish('topic/adasd', 'Hello Worldczczxczxczxc!');

        return 0;
    }
}
