<?php

namespace App\Command;

use phpcent\Client;
use PhpMqtt\Client\Contracts\MqttClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class MqttConsumeCommand extends Command
{
    protected static $defaultName = 'mqtt:consume';
    protected static $defaultDescription = 'Add a short description for your command';

    public function __construct(private MqttClient $client, private Client $centrifugo, string $name = null)
    {
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
            $this->client->registerMessageReceivedEventHandler(function (MqttClient $mqtt, string $topic, string $message) {
                $this->centrifugo->publish($topic, [
                    'time'      => (new \DateTime())->format('Y-m-d h:i:s'),
                    'topic'     => $topic,
                    'message'   => $message
                ]);

                echo sprintf("onMessageReceive on topic [%s]: %s\n", $topic, $message);
            });

            $this->client->loop(true);
            $this->client->disconnect();
        } catch (\Throwable $throwable) {
            $io->error($throwable->getMessage());
        }

        return 0;
    }
}
