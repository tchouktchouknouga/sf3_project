<?php

namespace CaradvisorBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pro
 *
 * @ORM\Table(name="pro")
 * @ORM\Entity(repositoryClass="CaradvisorBundle\Repository\ProRepository")
 */
class Pro
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
     * @ORM\Column(name="siret", type="bigint", length=13, unique=true)
     */
    private $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="dealerName", type="string", length=255)
     */
    private $dealerName;

    /**
     * @var string
     *
     * @ORM\Column(name="dealerType", type="string", length=255)
     */
    private $dealerType;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var int
     *
     * @ORM\Column(name="postalCode", type="integer")
     */
    private $postalCode;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer")
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="CaradvisorBundle\Entity\ReviewRepair", mappedBy="pro")
     */
    private $reviewRepairs;

    /**
     * @ORM\OneToMany(targetEntity="CaradvisorBundle\Entity\ReviewBuy", mappedBy="pro")
     */
    private $reviewBuys;

    /**
     * @ORM\ManyToOne(targetEntity="CaradvisorBundle\Entity\User", inversedBy="pros")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\Column(name="ratingPro", type="decimal", precision=10, scale=2)
     */
    private $ratingPro;

    /**
     * @ORM\Column(name="picture", type="blob")
     */
    private $picture;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set siret
     *
     * @param integer $siret
     *
     * @return Pro
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return int
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set dealerName
     *
     * @param string $dealerName
     *
     * @return Pro
     */
    public function setDealerName($dealerName)
    {
        $this->dealerName = $dealerName;

        return $this;
    }

    /**
     * Get dealerName
     *
     * @return string
     */
    public function getDealerName()
    {
        return $this->dealerName;
    }

    /**
     * Set dealerType
     *
     * @param string $dealerType
     *
     * @return Pro
     */
    public function setDealerType($dealerType)
    {
        $this->dealerType = $dealerType;

        return $this;
    }

    /**
     * Get dealerType
     *
     * @return string
     */
    public function getDealerType()
    {
        return $this->dealerType;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Pro
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Pro
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
     * Set postalCode
     *
     * @param integer $postalCode
     *
     * @return Pro
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return int
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Pro
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Pro
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
     * Constructor
     */
    public function __construct()
    {
        $this->pros = new ArrayCollection();
        $this->answers = new ArrayCollection();
        $this->reviewRepairs = new ArrayCollection();
        $this->reviewBuys = new ArrayCollection();
    }

    /**
     * Add reviewRepair
     *
     * @param ReviewRepair $reviewRepair
     *
     * @return Pro
     */
    public function addReviewRepair(ReviewRepair $reviewRepair)
    {
        $this->reviewRepairs[] = $reviewRepair;

        return $this;
    }

    /**
     * Remove reviewRepair
     *
     * @param ReviewRepair $reviewRepair
     */
    public function removeReviewRepair(ReviewRepair $reviewRepair)
    {
        $this->reviewRepairs->removeElement($reviewRepair);
    }

    /**
     * Get reviewRepairs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReviewRepairs()
    {
        return $this->reviewRepairs;
    }

    /**
     * Add reviewBuy
     *
     * @param ReviewBuy $reviewBuy
     *
     * @return Pro
     */
    public function addReviewBuy(ReviewBuy $reviewBuy)
    {
        $this->reviewBuys[] = $reviewBuy;

        return $this;
    }

    /**
     * Remove reviewBuy
     *
     * @param ReviewBuy $reviewBuy
     */
    public function removeReviewBuy(ReviewBuy $reviewBuy)
    {
        $this->reviewBuys->removeElement($reviewBuy);
    }

    /**
     * Get reviewBuys
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReviewBuys()
    {
        return $this->reviewBuys;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Pro
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \CaradvisorBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Pro
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return Pro
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * Set ratingPro
     *
     * @param string $ratingPro
     *
     * @return Pro
     */
    public function setRatingPro($ratingPro)
    {
        $this->ratingPro = $ratingPro;

        return $this;
    }

    /**
     * Get ratingPro
     *
     * @return string
     */
    public function getRatingPro()
    {
        return $this->ratingPro;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Pro
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }
}
