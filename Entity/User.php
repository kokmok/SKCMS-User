<?php

namespace SKCMS\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SKCMS\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @var string
     * @ORM\Column(name="firstName",type="string", length =255)
     */
    private $firstName;
    /**
     *
     * @var string
     * @ORM\Column(name="lastName",type="string", length =255)
     */
    private $lastName;
    
    /**
     *
     * @var string
     * @ORM\Column(name="phone",type="string", length =255,nullable=true)
     */
    private $phone;
    /**
     *
     * @var string
     * @ORM\Column(name="fax",type="string", length =255,nullable=true)
     */
    private $fax;
    
    /**
     * @ORM\OneToMany(targetEntity="SKCMS\UserBundle\Entity\Address", mappedBy="user",cascade="all")
     */
    private $addresses;
    
    /**
     * @ORM\OneToMany(targetEntity="SKCMS\TrackingBundle\Entity\Session", mappedBy="user")
     */
    private $sessions;
    
    
    public function __construct() {
        parent::__construct();
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Add addresses
     *
     * @param \SKCMS\UserBundle\Entity\Address $addresses
     * @return User
     */
    public function addAddress(\SKCMS\UserBundle\Entity\Address $address)
    {
        $this->addresses->add($address);
        $address->setUser($this);
        return $this;
    }

    /**
     * Remove addresses
     *
     * @param \SKCMS\UserBundle\Entity\Address $addresses
     */
    public function removeAddress(\SKCMS\UserBundle\Entity\Address $addresses)
    {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return User
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Add sessions
     *
     * @param \SKCMS\TrackingBundle\Entity\Session $sessions
     * @return User
     */
    public function addSession(\SKCMS\TrackingBundle\Entity\Session $sessions)
    {
        $this->sessions[] = $sessions;

        return $this;
    }

    /**
     * Remove sessions
     *
     * @param \SKCMS\TrackingBundle\Entity\Session $sessions
     */
    public function removeSession(\SKCMS\TrackingBundle\Entity\Session $sessions)
    {
        $this->sessions->removeElement($sessions);
    }

    /**
     * Get sessions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSessions()
    {
        return $this->sessions;
    }
}
