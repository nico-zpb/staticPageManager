<?php

namespace Sites\Admin\Common\StaticPageManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;
/**
 * Fragment
 *
 * @ORM\Table(name="fragments")
 * @ORM\Entity(repositoryClass="Sites\Admin\Common\StaticPageManagerBundle\Entity\FragmentRepository")
 */
class Fragment implements Translatable
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
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var string
     * @Gedmo\Translatable
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     * @Gedmo\SortablePosition
     */
    private $position;

    /**
     * @ORM\Column(name="category", type="string", length=64)
     * @Gedmo\SortableGroup
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="Sites\Admin\Common\StaticPageManagerBundle\Entity\StaticPage", mappedBy="fragments")
     */
    private $staticPages;

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
     * Set body
     *
     * @param string $body
     * @return Fragment
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Fragment
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
        $this->staticPages = new ArrayCollection();
        $this->category = "page_fragment";
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Fragment
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Fragment
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add staticPages
     *
     * @param StaticPage $staticPages
     * @return Fragment
     */
    public function addStaticPage(StaticPage $staticPages)
    {
        $this->staticPages[] = $staticPages;

        return $this;
    }

    /**
     * Remove staticPages
     *
     * @param StaticPage $staticPages
     */
    public function removeStaticPage(StaticPage $staticPages)
    {
        $this->staticPages->removeElement($staticPages);
    }

    /**
     * Get staticPages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStaticPages()
    {
        return $this->staticPages;
    }
}
