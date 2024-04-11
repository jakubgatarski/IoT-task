<?php

namespace App\Model;

class TemperatureExceededEvent
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
     * @Assert\Type("float")
     */
    private float $temp;

    /**
     * @Assert\NotNull
     * @Assert\Type("float")
     */
    private float $threshold;

    public function __construct(string $deviceId, \DateTimeInterface $eventDate, float $temp, float $threshold)
    {
        $this->deviceId = $deviceId;
        $this->eventDate = $eventDate;
        $this->temp = $temp;
        $this->threshold = $threshold;
    }

    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    public function getEventDate(): \DateTimeInterface
    {
        return $this->eventDate;
    }

    public function getTemp(): float
    {
        return $this->temp;
    }

    public function getThreshold(): float
    {
        return $this->threshold;
    }

    public function setDeviceId(string $deviceId): void
    {
        $this->deviceId = $deviceId;
    }

    public function setEventDate(\DateTimeInterface $eventDate): void
    {
        $this->eventDate = $eventDate;
    }

    public function setTemp(float $temp): void
    {
        $this->temp = $temp;
    }

    public function setThreshold(float $threshold): void
    {
        $this->threshold = $threshold;
    }
}
