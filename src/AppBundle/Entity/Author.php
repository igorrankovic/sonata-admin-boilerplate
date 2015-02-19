<?php

namespace AppBundle\Entity;

use AppBundle\Traits\IdentifiableTrait;
use AppBundle\Traits\BlameableTrait;
use AppBundle\Traits\TimestampableTrait;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Author
 *
 * @Gedmo\Loggable
 * @ORM\Table(options={"charset"="utf8", "collate"="utf8_bin"})
 * @ORM\Entity
 * @UniqueEntity(fields={"firstname","lastname"})
 */
class Author
{
    use IdentifiableTrait;
    use BlameableTrait;
    use TimestampableTrait;

    /**
     * @var String
     * @Gedmo\Slug(fields={"firstname", "lastname"}, updatable=true)
     * @ORM\Column(type="string", nullable=true)
     */
    private $slug;

    /**
     * @var String
     * @Gedmo\Versioned
     * @ORM\Column(type="string", nullable=true)
     */
    private $firstname;

    /**
     * @var String
     * @Gedmo\Versioned
     * @ORM\Column(type="string", nullable=true)
     */
    private $lastname;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Book", mappedBy="author", cascade={"persist", "remove"})
     */
    private $books;

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
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param String $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return String
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param String $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return ArrayCollection
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @param ArrayCollection $books
     */
    public function setBooks($books)
    {
        $this->books = $books;
    }

    /**
     * @param Book $book
     */
    public function addBook($book)
    {
        if (!$this->getBooks()->contains($book)) {
            $this->getBooks()->add($book);
        }
    }

    /**
     * @param Book $book
     */
    public function removeBook($book)
    {
        if ($this->getBooks()->contains($book)) {
            $this->getBooks()->removeElement($book);
        }
    }

    public function __toString()
    {
        return $this->getFirstname().' '.$this->getLastname();
    }

}