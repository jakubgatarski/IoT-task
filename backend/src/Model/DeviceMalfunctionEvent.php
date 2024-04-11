<?php

namespace App\Model;

class DeviceMalfunctionEvent
{
    /**
     * @Assert\NotBlank
     */
    private string $deviceId;

    /**
     * @Assert\DateTime
     */
    private \DateTimeInterface $eventDate;

    /**
     * @Assert\NotNull
     * @Assert\Type("integer")
     */
    private int $reasonCode;

    /**
     * @Assert\NotBlank
     */
    private string $reasonText;

    public function __construct(string $deviceId, \DateTimeInterface $eventDate, int $reasonCode, string $reasonText)
    {
        $this->deviceId = $deviceId;
        $this->eventDate = $eventDate;
        $this->reasonCode = $reasonCode;
        $this->reasonText = $reasonText;
    }

    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    public function getEventDate(): \DateTimeInterface
    {
        return $this->eventDate;
    }

    public function getReasonCode(): int
    {
        return $this->reasonCode;
    }

    public function getReasonText(): string
    {
        return $this->reasonText;
    }

    public function setDeviceId(string $deviceId): void
    {
        $this->deviceId = $deviceId;
    }

    public function setEventDate(\DateTimeInterface $eventDate): void
    {
        $this->eventDate = $eventDate;
    }

    public function setReasonCode(int $reasonCode): void
    {
        $this->reasonCode = $reasonCode;
    }

    public function setReasonText(string $reasonText): void
    {
        $this->reasonText = $reasonText;
    }
}
