<?php

namespace AddressBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="AddressBookBundle\Repository\AddressRepository")
 */
class Address
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
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var int
     *
     * @ORM\Column(name="housenumber", type="integer")
     */
    private $housenumber;

    /**
     * @var int
     *
     * @ORM\Column(name="flatnumber", type="integer")
     */
    private $flatnumber;


    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="address")
     */
    private $user;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set city
     *
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set housenumber
     *
     * @param integer $housenumber
     *
     * @return Address
     */
    public function setHousenumber($housenumber)
    {
        $this->housenumber = $housenumber;

        return $this;
    }

    /**
     * Get housenumber
     *
     * @return integer
     */
    public function getHousenumber()
    {
        return $this->housenumber;
    }

    /**
     * Set flatnumber
     *
     * @param integer $flatnumber
     *
     * @return Address
     */
    public function setFlatnumber($flatnumber)
    {
        $this->flatnumber = $flatnumber;

        return $this;
    }

    /**
     * Get flatnumber
     *
     * @return integer
     */
    public function getFlatnumber()
    {
        return $this->flatnumber;
    }

    /**
     * Add user
     *
     * @param \AddressBookBundle\Entity\User $user
     *
     * @return Address
     */
    public function addUser(\AddressBookBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AddressBookBundle\Entity\User $user
     */
    public function removeUser(\AddressBookBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }
}
