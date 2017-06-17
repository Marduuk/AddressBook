<?php

namespace AddressBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phone
 *
 * @ORM\Table(name="phone")
 * @ORM\Entity(repositoryClass="AddressBookBundle\Repository\PhoneRepository")
 */
class Phone
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
     * @var int
     *
     * @ORM\Column(name="phonenumber", type="integer")
     */
    private $phonenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="phonekind", type="string", length=255)
     */
    private $phonekind;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="phone")
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
     * Set phonenumber
     *
     * @param integer $phonenumber
     *
     * @return Phone
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return integer
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Set phonekind
     *
     * @param string $phonekind
     *
     * @return Phone
     */
    public function setPhonekind($phonekind)
    {
        $this->phonekind = $phonekind;

        return $this;
    }

    /**
     * Get phonekind
     *
     * @return string
     */
    public function getPhonekind()
    {
        return $this->phonekind;
    }

    /**
     * Add user
     *
     * @param \AddressBookBundle\Entity\User $user
     *
     * @return Phone
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
