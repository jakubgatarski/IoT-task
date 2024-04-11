<?php

namespace App\Model;

class DoorUnlockedEvent
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
     * @Assert\DateTime
     */
    private \DateTimeInterface $unlockDate;

    public function __construct(string $deviceId, \DateTimeInterface $eventDate, \DateTimeInterface $unlockDate)
    {
        $this->deviceId = $deviceId;
        $this->eventDate = $eventDate;
        $this->unlockDate = $unlockDate;
    }

    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    public function getEventDate(): \DateTimeInterface
    {
        return $this->eventDate;
    }

    public function getUnlockDate(): \DateTimeInterface
    {
        return $this->unlockDate;
    }

    public function setDeviceId(string $deviceId): void
    {
        $this->deviceId = $deviceId;
    }

    public function setEventDate(\DateTimeInterface $eventDate): void
    {
        $this->eventDate = $eventDate;
    }

    public function setUnlockDate(\DateTimeInterface $unlockDate): void
    {
        $this->unlockDate = $unlockDate;
    }
}
