<?php

namespace CaradvisorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ReviewRepair
 *
 * @ORM\Table(name="review_repair")
 * @ORM\Entity(repositoryClass="CaradvisorBundle\Repository\ReviewRepairRepository")
 */
class ReviewRepair
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
     * @ORM\Column(name="dealerType", type="string", length=255)
     */
    private $dealerType;

    /**
     * @var string
     *
     * @ORM\Column(name="dealerName", type="string", length=255)
     */
    private $dealerName;

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
     * @var string
     *
     * @ORM\Column(name="ratingGlobal", type="decimal", precision=10, scale=2)
     */
    private $ratingGlobal;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="review", type="text")
     */
    private $review;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRepair", type="date")
     */
    private $dateRepair;

    /**
     * @var string
     *
     * @ORM\Column(name="ratingWelcome", type="decimal", precision=10, scale=2)
     */
    private $ratingWelcome;

    /**
     * @var string
     *
     * @ORM\Column(name="typeRepair", type="string", length=255)
     */
    private $typeRepair;

    /**
     * @var int
     *
     * @ORM\Column(name="appointmentDelay", type="integer")
     */
    private $appointmentDelay;

    /**
     * @var string
     *
     * @ORM\Column(name="onSpotDelayRating", type="decimal", precision=10, scale=2)
     */
    private $onSpotDelayRating;

    /**
     * @var bool
     *
     * @ORM\Column(name="explanationRepair", type="boolean")
     */
    private $explanationRepair;

    /**
     * @var bool
     *
     * @ORM\Column(name="priceRepair", type="boolean")
     */
    private $priceRepair;

    /**
     * @var bool
     *
     * @ORM\Column(name="authorizationRepair", type="boolean")
     */
    private $authorizationRepair;

    /**
     * @var bool
     *
     * @ORM\Column(name="respectQuotationRepair", type="boolean")
     */
    private $respectQuotationRepair;

    /**
     * @var bool
     *
     * @ORM\Column(name="courtesyVehicle", type="boolean")
     */
    private $courtesyVehicle;

    /**
     * @var bool
     *
     * @ORM\Column(name="respectDelayRepair", type="boolean")
     */
    private $respectDelayRepair;

    /**
     * @var string
     *
     * @ORM\Column(name="conditionVehicleRating", type="decimal", precision=10, scale=2)
     */
    private $conditionVehicleRating;

    /**
     * @var string
     *
     * @ORM\Column(name="recommendProRating", type="decimal", precision=10, scale=2)
     */
    private $recommendProRating;

    /**
     * @var string
     *
     * @ORM\Column(name="advice", type="text")
     */
    private $advice;

    /**
     * @var string
     *
     * @ORM\Column(name="attachedFile", type="string")
     *
     * @Assert\NotBlank(message="Fichiers acceptés : .jpg, .jpeg, .pdf")
     * @Assert\File(mimeTypes={"application/pdf", "image/jpg", "image/jpeg"})
     */
    private $attachedFile;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReview", type="datetime")
     */
    private $dateReview;

    /**
     * @ORM\ManyToOne(targetEntity="CaradvisorBundle\Entity\Pro", inversedBy="reviewRepairs")
     */
    private $pro;

    /**
     * @ORM\ManyToOne(targetEntity="CaradvisorBundle\Entity\User", inversedBy="reviewRepairs")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="CaradvisorBundle\Entity\Answer", cascade={"remove"})
     * @ORM\JoinColumn(name="answer_id", referencedColumnName="id")
     */
    private $answer;

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
     * Set dealerType
     *
     * @param string $dealerType
     *
     * @return ReviewRepair
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
     * Set dealerName
     *
     * @param string $dealerName
     *
     * @return ReviewRepair
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
     * Set city
     *
     * @param string $city
     *
     * @return ReviewRepair
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
     * @return ReviewRepair
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
     * Set ratingGlobal
     *
     * @param string $ratingGlobal
     *
     * @return ReviewRepair
     */
    public function setRatingGlobal($ratingGlobal)
    {
        $this->ratingGlobal = $ratingGlobal;

        return $this;
    }

    /**
     * Get ratingGlobal
     *
     * @return string
     */
    public function getRatingGlobal()
    {
        return $this->ratingGlobal;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return ReviewRepair
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set review
     *
     * @param string $review
     *
     * @return ReviewRepair
     */
    public function setReview($review)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * Get review
     *
     * @return string
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Set dateRepair
     *
     * @param \DateTime $dateRepair
     *
     * @return ReviewRepair
     */
    public function setDateRepair($dateRepair)
    {
        $this->dateRepair = $dateRepair;

        return $this;
    }

    /**
     * Get dateRepair
     *
     * @return \DateTime
     */
    public function getDateRepair()
    {
        return $this->dateRepair;
    }

    /**
     * Set ratingWelcome
     *
     * @param string $ratingWelcome
     *
     * @return ReviewRepair
     */
    public function setRatingWelcome($ratingWelcome)
    {
        $this->ratingWelcome = $ratingWelcome;

        return $this;
    }

    /**
     * Get ratingWelcome
     *
     * @return string
     */
    public function getRatingWelcome()
    {
        return $this->ratingWelcome;
    }

    /**
     * Set typeRepair
     *
     * @param string $typeRepair
     *
     * @return ReviewRepair
     */
    public function setTypeRepair($typeRepair)
    {
        $this->typeRepair = $typeRepair;

        return $this;
    }

    /**
     * Get typeRepair
     *
     * @return string
     */
    public function getTypeRepair()
    {
        return $this->typeRepair;
    }

    /**
     * Set appointmentDelay
     *
     * @param integer $appointmentDelay
     *
     * @return ReviewRepair
     */
    public function setAppointmentDelay($appointmentDelay)
    {
        $this->appointmentDelay = $appointmentDelay;

        return $this;
    }

    /**
     * Get appointmentDelay
     *
     * @return int
     */
    public function getAppointmentDelay()
    {
        return $this->appointmentDelay;
    }

    /**
     * Set onSpotDelayRating
     *
     * @param string $onSpotDelayRating
     *
     * @return ReviewRepair
     */
    public function setOnSpotDelayRating($onSpotDelayRating)
    {
        $this->onSpotDelayRating = $onSpotDelayRating;

        return $this;
    }

    /**
     * Get onSpotDelayRating
     *
     * @return string
     */
    public function getOnSpotDelayRating()
    {
        return $this->onSpotDelayRating;
    }

    /**
     * Set explanationRepair
     *
     * @param boolean $explanationRepair
     *
     * @return ReviewRepair
     */
    public function setExplanationRepair($explanationRepair)
    {
        $this->explanationRepair = $explanationRepair;

        return $this;
    }

    /**
     * Get explanationRepair
     *
     * @return bool
     */
    public function getExplanationRepair()
    {
        return $this->explanationRepair;
    }

    /**
     * Set priceRepair
     *
     * @param boolean $priceRepair
     *
     * @return ReviewRepair
     */
    public function setPriceRepair($priceRepair)
    {
        $this->priceRepair = $priceRepair;

        return $this;
    }

    /**
     * Get priceRepair
     *
     * @return bool
     */
    public function getPriceRepair()
    {
        return $this->priceRepair;
    }

    /**
     * Set authorizationRepair
     *
     * @param boolean $authorizationRepair
     *
     * @return ReviewRepair
     */
    public function setAuthorizationRepair($authorizationRepair)
    {
        $this->authorizationRepair = $authorizationRepair;

        return $this;
    }

    /**
     * Get authorizationRepair
     *
     * @return bool
     */
    public function getAuthorizationRepair()
    {
        return $this->authorizationRepair;
    }

    /**
     * Set respectQuotationRepair
     *
     * @param boolean $respectQuotationRepair
     *
     * @return ReviewRepair
     */
    public function setRespectQuotationRepair($respectQuotationRepair)
    {
        $this->respectQuotationRepair = $respectQuotationRepair;

        return $this;
    }

    /**
     * Get respectQuotationRepair
     *
     * @return bool
     */
    public function getRespectQuotationRepair()
    {
        return $this->respectQuotationRepair;
    }

    /**
     * Set courtesyVehicle
     *
     * @param boolean $courtesyVehicle
     *
     * @return ReviewRepair
     */
    public function setCourtesyVehicle($courtesyVehicle)
    {
        $this->courtesyVehicle = $courtesyVehicle;

        return $this;
    }

    /**
     * Get courtesyVehicle
     *
     * @return bool
     */
    public function getCourtesyVehicle()
    {
        return $this->courtesyVehicle;
    }

    /**
     * Set respectDelayRepair
     *
     * @param boolean $respectDelayRepair
     *
     * @return ReviewRepair
     */
    public function setRespectDelayRepair($respectDelayRepair)
    {
        $this->respectDelayRepair = $respectDelayRepair;

        return $this;
    }

    /**
     * Get respectDelayRepair
     *
     * @return bool
     */
    public function getRespectDelayRepair()
    {
        return $this->respectDelayRepair;
    }

    /**
     * Set conditionVehicleRating
     *
     * @param string $conditionVehicleRating
     *
     * @return ReviewRepair
     */
    public function setConditionVehicleRating($conditionVehicleRating)
    {
        $this->conditionVehicleRating = $conditionVehicleRating;

        return $this;
    }

    /**
     * Get conditionVehicleRating
     *
     * @return string
     */
    public function getConditionVehicleRating()
    {
        return $this->conditionVehicleRating;
    }

    /**
     * Set recommendProRating
     *
     * @param string $recommendProRating
     *
     * @return ReviewRepair
     */
    public function setRecommendProRating($recommendProRating)
    {
        $this->recommendProRating = $recommendProRating;

        return $this;
    }

    /**
     * Get recommendProRating
     *
     * @return string
     */
    public function getRecommendProRating()
    {
        return $this->recommendProRating;
    }

    /**
     * Set advice
     *
     * @param string $advice
     *
     * @return ReviewRepair
     */
    public function setAdvice($advice)
    {
        $this->advice = $advice;

        return $this;
    }

    /**
     * Get advice
     *
     * @return string
     */
    public function getAdvice()
    {
        return $this->advice;
    }

    /**
     * Set attachedFile
     *
     * @param string $attachedFile
     *
     * @return ReviewRepair
     */
    public function setAttachedFile($attachedFile)
    {
        $this->attachedFile = $attachedFile;

        return $this;
    }

    /**
     * Get attachedFile
     *
     * @return string
     */
    public function getAttachedFile()
    {
        return $this->attachedFile;
    }

    /**
     * Set dateReview
     *
     * @param \DateTime $dateReview
     *
     * @return ReviewRepair
     */
    public function setDateReview($dateReview)
    {
        $this->dateReview = $dateReview;

        return $this;
    }

    /**
     * Get dateReview
     *
     * @return \DateTime
     */
    public function getDateReview()
    {
        return $this->dateReview;
    }

    /**
     * Set pro
     *
     * @param \CaradvisorBundle\Entity\Pro $pro
     *
     * @return ReviewRepair
     */
    public function setPro(\CaradvisorBundle\Entity\Pro $pro = null)
    {
        $this->pro = $pro;

        return $this;
    }

    /**
     * Get pro
     *
     * @return \CaradvisorBundle\Entity\Pro
     */
    public function getPro()
    {
        return $this->pro;
    }

    /**
     * Set user
     *
     * @param \CaradvisorBundle\Entity\User $user
     *
     * @return ReviewRepair
     */
    public function setUser(\CaradvisorBundle\Entity\User $user = null)
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
     * Set answer
     *
     * @param \CaradvisorBundle\Entity\Answer $answer
     *
     * @return ReviewRepair
     */
    public function setAnswer(\CaradvisorBundle\Entity\Answer $answer = null)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return \CaradvisorBundle\Entity\Answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    public function __construct()
    {
        $this->dateReview = new \DateTime();
    }
}
