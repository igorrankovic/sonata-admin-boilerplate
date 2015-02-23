<?php

namespace AppBundle\Traits;

trait SortableTrait
{
    /**
     * @var integer
     * @Gedmo\SortablePosition
     * @ORM\Column(type="integer")
     */
    protected $position;

    /**
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param integer $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }
}