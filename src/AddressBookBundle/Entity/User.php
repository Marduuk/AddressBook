<?php

namespace AddressBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AddressBookBundle\Repository\UserRepository")
 */
class User
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


    /**
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="user")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;
    /**
     * @ORM\ManyToOne(targetEntity="Phone", inversedBy="user")
     * @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     */
    private $phone;
    /**
     * @ORM\ManyToOne(targetEntity="Email", inversedBy="user")
     * @ORM\JoinColumn(name="email_id", referencedColumnName="id")
     */
    private $email;

    public function getAddress(){
        return $this->address;
    }






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
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
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
     * Set address
     *
     * @param \AddressBookBundle\Entity\Address $address
     * @return User
     */
    public function setAddress(\AddressBookBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Set phone
     *
     * @param \AddressBookBundle\Entity\Phone $phone
     * @return User
     */
    public function setPhone(\AddressBookBundle\Entity\Phone $phone = null)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return \AddressBookBundle\Entity\Phone 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param \AddressBookBundle\Entity\Email $email
     * @return User
     */
    public function setEmail(\AddressBookBundle\Entity\Email $email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return \AddressBookBundle\Entity\Email 
     */
    public function getEmail()
    {
        return $this->email;
    }
}
