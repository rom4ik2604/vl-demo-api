<?php

namespace App\Command;

use App\Packets\PacketSerializer;
use PhpMqtt\Client\Contracts\MqttClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class MqttConsumeCommand extends Command
{
    protected static $defaultName = 'mqtt:consume';
    protected static $defaultDescription = 'Add a short description for your command';

    public function __construct(
        private MqttClient $client,
        private PacketSerializer $serializer,
        private MessageBusInterface $bus,
        string $name = null,
    ) {
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            if (!$this->client->isConnected()) {
                $this->client->connect();
            }

            $this->client->subscribe('#');

            $this->client->registerMessageReceivedEventHandler(function (MqttClient $mqtt, string $topic, string $packet) {
                $message = $this->serializer->deserialize($packet);

                if ($message !== null) {
                    $this->bus->dispatch($message);
                }
            });

            $this->client->loop(true);
            $this->client->disconnect();
        } catch (\Throwable $throwable) {
            $io->error($throwable->getMessage());
        }

        return 0;
    }
}
