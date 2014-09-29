<?php

namespace Brainstrap\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hobby
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Hobby
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
     *
     * @ORM\Column(name="caption", type="string", length=255)
     */
    private $caption;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="galleries", type="string", length=255)
     */
    private $galleries;


    /**
     * Get id.

     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set caption.

     *
     * @param string $caption
     *
     * @return Hobby
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption.

     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set description.

     *
     * @param string $description
     *
     * @return Hobby
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.

     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set galleries.

     *
     * @param string $galleries
     *
     * @return Hobby
     */
    public function setGalleries($galleries)
    {
        $this->galleries = $galleries;

        return $this;
    }

    /**
     * Get galleries.

     *
     * @return string
     */
    public function getGalleries()
    {
        return $this->galleries;
    }
}
