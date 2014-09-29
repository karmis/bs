<?php

namespace Brainstrap\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Portfolio
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Portfolio
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
     * Get id.

     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
