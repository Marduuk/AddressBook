<?php

namespace AddressBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table(name="email")
 * @ORM\Entity(repositoryClass="AddressBookBundle\Repository\EmailRepository")
 */
class Email
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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="emailtype", type="string", length=255)
     */
    private $emailtype;


    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="email")
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
     * Set email
     *
     * @param string $email
     *
     * @return Email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set emailtype
     *
     * @param string $emailtype
     *
     * @return Email
     */
    public function setEmailtype($emailtype)
    {
        $this->emailtype = $emailtype;

        return $this;
    }

    /**
     * Get emailtype
     *
     * @return string
     */
    public function getEmailtype()
    {
        return $this->emailtype;
    }

    /**
     * Add user
     *
     * @param \AddressBookBundle\Entity\User $user
     *
     * @return Email
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
