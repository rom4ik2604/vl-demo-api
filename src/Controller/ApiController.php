<?php

namespace App\Controller;

use Firebase\JWT\JWT;
use PhpMqtt\Client\Contracts\MqttClient;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    private const JWT_SECRET = '46b38493-147e-4e3f-86e0-dc5ec54f5133';

    public function __construct(private MqttClient $client, LoggerInterface $logger)
    {
    }

    #[Route('/api', name: 'api')]
    public function index(Request $request): Response
    {
        try {
            if (!$this->client->isConnected()) {
                $this->client->connect();
            }

            $this->client->publish($request->get('topic'), $request->get('message'));
        } catch (\Throwable $throwable) {
            return $this->json(['error' => $throwable->getMessage()]);
        }

        return $this->json([]);
    }

    #[Route('/token', name: 'token')]
    public function token(): Response
    {
        $payload = [
            'sub' => '123' . random_int(1, 100),
            'exp' => time() + 3600
        ];

        $token = JWT::encode($payload, self::JWT_SECRET);

        return $this->json(['token' => $token]);
    }
}
