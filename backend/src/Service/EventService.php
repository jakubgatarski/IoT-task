<?php

namespace App\Service;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Model\DeviceMalfunctionEvent;
use App\Model\TemperatureExceededEvent;
use App\Model\DoorUnlockedEvent;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class EventService
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function handleEvent(string $eventType, array $data): void
    {
        $event = $this->createEventObject($eventType, $data);

        $errors = $this->validator->validate($event);

        if (count($errors) > 0) {
            $this->handleValidationErrors($errors);
            return;
        }

        switch ($eventType) {
            case 'deviceMalfunction':
                $this->logEvent($data);
                $this->sendEmail($data);
                break;
            case 'temperatureExceeded':
                $this->logEvent($data);
                $this->sendRestRequest($data);
                break;
            case 'doorUnlocked':
                $this->logEvent($data);
                $this->sendSms($data);
                break;
            default:
                echo "Unknown event type: $eventType\n";
                break;
        }
    }

    private function createEventObject(string $eventType, array $data)
    {
        switch ($eventType) {
            case 'deviceMalfunction':
                return new DeviceMalfunctionEvent(
                    $data['deviceId'],
                    new \DateTime($data['eventDate']),
                    $data['reasonCode'],
                    $data['reasonText']
                );
            case 'temperatureExceeded':
                return new TemperatureExceededEvent(
                    $data['deviceId'],
                    new \DateTime($data['eventDate']),
                    $data['temp'],
                    $data['threshold']
                );
            case 'doorUnlocked':
                return new DoorUnlockedEvent(
                    $data['deviceId'],
                    new \DateTime($data['eventDate']),
                    new \DateTime($data['unlockDate'])
                );
            default:
                throw new \Exception("Unknown event type: $eventType");
        }
    }

    private function handleValidationErrors(ConstraintViolationListInterface $errors): void
    {
        echo "Validation errors:\n";
        foreach ($errors as $error) {
            echo $error->getPropertyPath() . ': ' . $error->getMessage() . "\n";
        }
    }

    private function logEvent(array $data): void
    {
        // Miejsce na logikę logowania zdarzenia
        echo "Logging event: " . json_encode($data) . "\n";
    }

    private function sendEmail(array $data): void
    {
        // Symulacja wysyłania e-maila
        echo "Sending email for event: " . json_encode($data) . "\n";
    }

    private function sendSms(array $data): void
    {
        // Symulacja wysyłania SMS
        echo "Sending SMS for event: " . json_encode($data) . "\n";
    }

    private function sendRestRequest(array $data): void
    {
        // Symulacja wysyłania żądania REST
        echo "Sending REST request for event: " . json_encode($data) . "\n";
    }
}

