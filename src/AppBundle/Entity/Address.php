<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Address
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    public $id;

    /** @ORM\Column(length=50,unique=true) */
    public $address;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="addresses")
     **/
    public $user;
}