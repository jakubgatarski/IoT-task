<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\EventService;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventController extends AbstractController
{
    private $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * @Route("/api/event", name="receive_event", methods={"POST"})
     */
    public function receiveEvent(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (is_null($data)) {
            return $this->json(['error' => 'Invalid JSON'], Response::HTTP_BAD_REQUEST);
        }

        try {
            $eventType = $data['eventType'] ?? null;
            if (is_null($eventType)) {
                throw new \Exception("Event type not provided");
            }

            $this->eventService->handleEvent($eventType, $data);
            return $this->json(['message' => 'Event processed successfully']);
        } catch (\Exception $e) {
            return $this->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
