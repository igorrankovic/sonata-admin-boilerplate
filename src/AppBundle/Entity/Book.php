<?php

namespace AppBundle\Entity;

use AppBundle\Traits\IdentifiableTrait;
use AppBundle\Traits\BlameableTrait;
use AppBundle\Traits\TimestampableTrait;
use AppBundle\Traits\SortableTrait;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Book
 *
 * @Gedmo\Loggable
 * @Gedmo\SoftDeleteable(fieldName="timeDeleted", timeAware=false)
 * @ORM\Table(options={"charset"="utf8", "collate"="utf8_general_ci"})
 * @ORM\Entity
 * @UniqueEntity(fields={"title","author"})
 */
class Book
{
    use IdentifiableTrait;
    use BlameableTrait;
    use TimestampableTrait;
    use SortableTrait;

    /**
     * @var String
     * @Gedmo\Slug(fields={"title"}, updatable=true)
     * @ORM\Column(type="string", nullable=true)
     */
    private $slug;

    /**
     * @var String
     * @Gedmo\Versioned
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pages;

    /**
     * @var Author
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="books")
     */
    private $author;

    public function __construct()
    {

    }

    /**
     * @return String
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param String $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return String
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param String $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param int $pages
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}