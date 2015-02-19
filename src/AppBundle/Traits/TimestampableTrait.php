<?php

namespace AppBundle\Traits;

trait TimestampableTrait
{
    /**
     * @var DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $timeCreated;

    /**
     * @var DateTime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $timeUpdated;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $timeDeleted;

    /**
     * @return DateTime
     */
    public function getTimeCreated()
    {
        return $this->timeCreated;
    }

    /**
     * @param DateTime $timeCreated
     */
    public function setTimeCreated($timeCreated)
    {
        $this->timeCreated = $timeCreated;
    }

    /**
     * @return DateTime
     */
    public function getTimeUpdated()
    {
        return $this->timeUpdated;
    }

    /**
     * @param DateTime $timeUpdated
     */
    public function setTimeUpdated($timeUpdated)
    {
        $this->timeUpdated = $timeUpdated;
    }

    /**
     * @return DateTime
     */
    public function getTimeDeleted()
    {
        return $this->timeDeleted;
    }

    /**
     * @param DateTime $timeDeleted
     */
    public function setTimeDeleted($timeDeleted)
    {
        $this->timeDeleted = $timeDeleted;
    }

}