<?php

namespace CaradvisorBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @UniqueEntity(fields={"email"}, message="L'email est déjà pris", groups={"registration"})
 * @UniqueEntity(fields={"userName"}, message="Le nom d'utilisateur est déjà pris")
 * @ORM\Entity(repositoryClass="CaradvisorBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
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
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="userName", type="string", length=255, unique=true)
     */
    private $userName;

    /**
     * @Assert\Length(max="4096")
     */
    private $plainpassword;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;

    /**
     * @var bool
     *
     * @ORM\Column(name="mailingList", type="boolean", nullable=true)
     */
    private $mailingList;

    /**
     * @ORM\Column(name="picture", type="blob", nullable=true)
     */
    private $picture;

    /**
     * @ORM\OneToMany(targetEntity="CaradvisorBundle\Entity\Vehicle", mappedBy="user")
     */
    private $vehicles;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @var array
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = array();

    /**
     * @ORM\Column(name="token", type="string", length=255, nullable=true)
     */
    private $token;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_limit_token", type="datetime", nullable=true)
     */
    private $dateLimitToken;

    /**
     * @ORM\OneToOne(targetEntity="CaradvisorBundle\Entity\UserProfile", cascade={"persist"})
     * @ORM\JoinColumn(name="userProfile_id", referencedColumnName="id")
     */
    private $userProfile;

    /**
     * @ORM\OneToMany(targetEntity="CaradvisorBundle\Entity\Pro", mappedBy="user")
     */
    private $pros;

    /**
     * @ORM\OneToMany(targetEntity="CaradvisorBundle\Entity\ReviewRepair", mappedBy="user")
     */
    private $reviewRepairs;

    /**
     * @ORM\OneToMany(targetEntity="CaradvisorBundle\Entity\ReviewBuy", mappedBy="user")
     */
    private $reviewBuys;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->isActive = false;
        $this->vehicles = new ArrayCollection();
        $this->pros = new ArrayCollection();
        $this->reviewRepairs = new ArrayCollection();
        $this->reviewBuys = new ArrayCollection();
    }

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
     * Set firstName
     *
     * @param string $firstName
     *
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
     *
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
     * Set userName
     *
     * @param string $userName
     *
     * @return User
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * @return mixed
     */
    public function getPlainpassword()
    {
        return $this->plainpassword;
    }

    /**
     * @param mixed $plainpassword
     * @return User
     */
    public function setPlainpassword($plainpassword)
    {
        $this->plainpassword = $plainpassword;
        // https://knpuniversity.com/screencast/symfony-security/user-plain-password
        $this->password = null;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set mailingList
     *
     * @param boolean $mailingList
     *
     * @return User
     */
    public function setMailingList($mailingList)
    {
        $this->mailingList = $mailingList;
        return $this;
    }

    /**
     * Get mailingList
     *
     * @return bool
     */
    public function getMailingList()
    {
        return $this->mailingList;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return User
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

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        /* Symfony calls this after logging in, and it's just a minor security
        measure to prevent the plain-text password from being accidentally saved anywhere.*/
        $this->plainPassword = null;
    }

    public function serialize()
    {
        return serialize([
            $this->id,
            $this->userName,
            $this->password,
        ]);
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->userName,
            $this->password,
            ) = unserialize($serialized);
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     * @return User
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function generateToken()
    {
        return sha1(microtime() . $this->getEmail());
    }

    /**
     * @return mixed
     */
    public function getDateLimitToken()
    {
        return $this->dateLimitToken;
    }

    /**
     * @param mixed $dateLimitToken
     * @return User
     */
    public function setDateLimitToken($dateLimitToken)
    {
        $this->dateLimitToken = $dateLimitToken;
        return $this;
    }

    /**
     * Add vehicle
     *
     * @param \CaradvisorBundle\Entity\Vehicle $vehicle
     *
     * @return User
     */
    public function addVehicle(\CaradvisorBundle\Entity\Vehicle $vehicle)
    {
        $this->vehicles[] = $vehicle;

        return $this;
    }

    /**
     * Remove vehicle
     *
     * @param \CaradvisorBundle\Entity\Vehicle $vehicle
     */
    public function removeVehicle(\CaradvisorBundle\Entity\Vehicle $vehicle)
    {
        $this->vehicles->removeElement($vehicle);
    }

    /**
     * Get vehicles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVehicles()
    {
        return $this->vehicles;
    }

    /**
     * Add pro
     *
     * @param \CaradvisorBundle\Entity\Pro $pro
     *
     * @return User
     */
    public function addPro(\CaradvisorBundle\Entity\Pro $pro)
    {
        $this->pros[] = $pro;
        return $this;
    }

    /**
     * Remove pro
     *
     * @param \CaradvisorBundle\Entity\Pro $pro
     */
    public function removePro(\CaradvisorBundle\Entity\Pro $pro)
    {
        $this->pros->removeElement($pro);
    }

    /**
     * Get pros
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPros()
    {
        return $this->pros;
    }

    /**
     * Add reviewRepair
     *
     * @param \CaradvisorBundle\Entity\ReviewRepair $reviewRepair
     *
     * @return User
     */
    public function addReviewRepair(\CaradvisorBundle\Entity\ReviewRepair $reviewRepair)
    {
        $this->reviewRepairs[] = $reviewRepair;
        return $this;
    }

    /**
     * Remove reviewRepair
     *
     * @param \CaradvisorBundle\Entity\ReviewRepair $reviewRepair
     */
    public function removeReviewRepair(\CaradvisorBundle\Entity\ReviewRepair $reviewRepair)
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
     * @param \CaradvisorBundle\Entity\ReviewBuy $reviewBuy
     *
     * @return User
     */
    public function addReviewBuy(\CaradvisorBundle\Entity\ReviewBuy $reviewBuy)
    {
        $this->reviewBuys[] = $reviewBuy;
        return $this;
    }

    /**
     * Remove reviewBuy
     *
     * @param \CaradvisorBundle\Entity\ReviewBuy $reviewBuy
     */
    public function removeReviewBuy(\CaradvisorBundle\Entity\ReviewBuy $reviewBuy)
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
     * Set userProfile
     *
     * @param \CaradvisorBundle\Entity\UserProfile $userProfile
     *
     * @return User
     */
    public function setUserProfile(\CaradvisorBundle\Entity\UserProfile $userProfile = null)
    {
        $this->userProfile = $userProfile;

        return $this;
    }

    /**
     * Get userProfile
     *
     * @return \CaradvisorBundle\Entity\UserProfile
     */
    public function getUserProfile()
    {
        return $this->userProfile;
    }
}
