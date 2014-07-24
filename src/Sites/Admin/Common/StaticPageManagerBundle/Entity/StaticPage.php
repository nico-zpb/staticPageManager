<?php

namespace Sites\Admin\Common\StaticPageManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

/**
 * StaticPage
 *
 * @ORM\Table(name="static_pages")
 * @ORM\Entity(repositoryClass="Sites\Admin\Common\StaticPageManagerBundle\Entity\StaticPageRepository")
 */
class StaticPage implements Translatable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Gedmo\Translatable
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     * @Gedmo\Translatable
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity="Sites\Admin\Common\StaticPageManagerBundle\Entity\Fragment", inversedBy="staticPages")
     * @ORM\JoinTable(name="static_pages_fragments")
     */
    private $fragments;

    /**
     * @Gedmo\Locale
     */
    private $locale;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return StaticPage
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return StaticPage
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $locale
     */
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fragments = new ArrayCollection();
    }

    /**
     * Add fragments
     *
     * @param Fragment $fragments
     * @return StaticPage
     */
    public function addFragment(Fragment $fragments)
    {
        $this->fragments[] = $fragments;

        return $this;
    }

    /**
     * Remove fragments
     *
     * @param Fragment $fragments
     */
    public function removeFragment(Fragment $fragments)
    {
        $this->fragments->removeElement($fragments);
    }

    /**
     * Get fragments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFragments()
    {
        return $this->fragments;
    }
}
