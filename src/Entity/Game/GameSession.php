<?php

namespace App\Entity\Game;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Game")
 */
class GameSession
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="add_date", type="datetime")
     */
    private $addDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="session_date", type="datetime")
     */
    private $sessionDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="max_date_inscription", type="datetime")
     */
    private $maxDateInscription;

    /**
     * @var float
     * @ORM\Column(name="session_rate", type="float")
     */
    private $sessionRate;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User\Member", mappedBy="session")
     */
    private $members;

    /**
     * @var int
     * @ORM\Column(name="max_places", type="integer")
     */
    private $maxPlaces;

    /**
     * @var int
     * @ORM\Column(name="session_duration", type="integer")
     */
    private $sessionDuration;


    public function __construct()
    {
        $this->addDate = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getMaxDateInscription(): \DateTime
    {
        return $this->maxDateInscription;
    }

    /**
     * @param \DateTime $maxDateInscription
     */
    public function setMaxDateInscription(\DateTime $maxDateInscription): void
    {
        $this->maxDateInscription = $maxDateInscription;
    }

    /**
     * @return float
     */
    public function getSessionRate(): ?float
    {
        return $this->sessionRate;
    }

    /**
     * @param float $sessionRate
     */
    public function setSessionRate(float $sessionRate): void
    {
        $this->sessionRate = $sessionRate;
    }

    /**
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param mixed $members
     */
    public function setMembers($members): void
    {
        $this->members = $members;
    }

    /**
     * @return int
     */
    public function getSessionDuration(): ?int
    {
        return $this->sessionDuration;
    }

    /**
     * @param int $sessionDuration
     */
    public function setSessionDuration(int $sessionDuration): void
    {
        $this->sessionDuration = $sessionDuration;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddDate(): ?\DateTimeInterface
    {
        return $this->addDate;
    }

    public function setAddDate(\DateTimeInterface $addDate): self
    {
        $this->addDate = $addDate;

        return $this;
    }

    public function getSessionDate(): ?\DateTimeInterface
    {
        return $this->sessionDate;
    }

    public function setSessionDate(\DateTimeInterface $sessionDate): self
    {
        $this->sessionDate = $sessionDate;

        return $this;
    }


    public function getMaxPlaces(): ?int
    {
        return $this->maxPlaces;
    }

    public function setMaxPlaces(int $maxPlaces): self
    {
        $this->maxPlaces = $maxPlaces;

        return $this;
    }
}
