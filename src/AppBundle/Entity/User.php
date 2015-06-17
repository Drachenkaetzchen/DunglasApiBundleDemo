<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Table(name="DoctrineUser")
 */
class User {
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    public $id;

    /**
     * @ORM\Column(length=50)
     * @Groups({"user"})
     */
    public $name;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Group", inversedBy="users", cascade={"persist"})
     * @ORM\JoinTable(name="users_groups")
     * @Groups({"user"})
     */
    public $groups;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Address", mappedBy="user")
     * @Groups({"user"})
     */
    public $addresses;

    public function __construct () {
        $this->groups = new ArrayCollection();
        $this->addresses = new ArrayCollection();
    }
}
