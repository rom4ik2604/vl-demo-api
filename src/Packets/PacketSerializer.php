<?php

namespace App\Packets;

use App\Messages\InitPacketMessage;
use App\Messages\PacketMessageInterface;
use App\Messages\StatePacketMessage;
use JetBrains\PhpStorm\ArrayShape;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

class PacketSerializer implements ServiceSubscriberInterface
{
    public function __construct(
        private ContainerInterface $container,
        private SerializerInterface $serializer,
        private LoggerInterface $logger
    ) {
    }

    public function deserialize(string $packet): ?PacketMessageInterface
    {
        try {
            $packetType = $this->extractPacketType($packet);
            if ($this->container->has($packetType)) {
                return $this->serializer->deserialize($packet, get_class($this->container->get($packetType)), 'json');
            }
        } catch (\Throwable $throwable) {
            $this->logger->critical($throwable->getMessage());
        }
        
        return null;
    }
    
    #[ArrayShape(['I' => "string", 'S' => "string"])]
    public static function getSubscribedServices(): array
    {
        return [
            'I' => InitPacketMessage::class,
            'S' => StatePacketMessage::class
        ];
    }

    private function extractPacketType(string $packet): ?string
    {
        return json_decode($packet)?->type;
    }
}