<?php

namespace CaradvisorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ReviewBuy
 *
 * @ORM\Table(name="review_buy")
 * @ORM\Entity(repositoryClass="CaradvisorBundle\Repository\ReviewBuyRepository")
 */
class ReviewBuy
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
     * @ORM\Column(name="reviewBuyType", type="string", length=255)
     */
    private $reviewBuyType;
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
     * @ORM\Column(name="dateBuy", type="datetime")
     */
    private $dateBuy;
    /**
     * @var string
     *
     * @ORM\Column(name="ratingWelcome", type="decimal", precision=10, scale=2)
     */
    private $ratingWelcome;
    /**
     * @var string
     *
     * @ORM\Column(name="informationDelayRating", type="decimal", precision=10, scale=2)
     */
    private $informationDelayRating;
    /**
     * @var bool
     *
     * @ORM\Column(name="wantedInformation", type="boolean")
     */
    private $wantedInformation;
    /**
     * @var bool
     *
     * @ORM\Column(name="test", type="boolean")
     */
    private $test;
    /**
     * @var bool
     *
     * @ORM\Column(name="wantedEngineTest", type="boolean")
     */
    private $wantedEngineTest;
    /**
     * @var bool
     *
     * @ORM\Column(name="fundingSolution", type="boolean")
     */
    private $fundingSolution;
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
     * @Assert\NotBlank(message="Fichiers acceptés : .jpg, .pdf, .png")
     * @Assert\File(mimeTypes={"application/pdf", "image/jpg", "image/jpeg", "image/png"})
     */
    private $attachedFile;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReview", type="datetime")
     */
    private $dateReview;
    /**
     * @var bool
     *
     * @ORM\Column(name="warranty", type="boolean")
     */
    private $warranty;
    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean", nullable=true)
     */
    private $isActive;

    // Join Column: interdit la creation d'un review sans Pro
    /**
     * @ORM\ManyToOne(targetEntity="CaradvisorBundle\Entity\Pro", inversedBy="reviewBuys")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pro;
    /**
     * @ORM\ManyToOne(targetEntity="CaradvisorBundle\Entity\User", inversedBy="reviewBuys")
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
     * @return ReviewBuy
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
     * @return ReviewBuy
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
     * @return ReviewBuy
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
     * @return ReviewBuy
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
     * @return ReviewBuy
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
     * @return ReviewBuy
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
     * @return ReviewBuy
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
     * Set dateBuy
     *
     * @param \DateTime $dateBuy
     *
     * @return ReviewBuy
     */
    public function setDateBuy($dateBuy)
    {
        $this->dateBuy = $dateBuy;
        return $this;
    }
    /**
     * Get dateBuy
     *
     * @return \DateTime
     */
    public function getDateBuy()
    {
        return $this->dateBuy;
    }
    /**
     * Set ratingWelcome
     *
     * @param string $ratingWelcome
     *
     * @return ReviewBuy
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
     * Set informationDelayRating
     *
     * @param string $informationDelayRating
     *
     * @return ReviewBuy
     */
    public function setInformationDelayRating($informationDelayRating)
    {
        $this->informationDelayRating = $informationDelayRating;
        return $this;
    }
    /**
     * Get informationDelayRating
     *
     * @return string
     */
    public function getInformationDelayRating()
    {
        return $this->informationDelayRating;
    }
    /**
     * Set wantedInformation
     *
     * @param boolean $wantedInformation
     *
     * @return ReviewBuy
     */
    public function setWantedInformation($wantedInformation)
    {
        $this->wantedInformation = $wantedInformation;
        return $this;
    }
    /**
     * Get wantedInformation
     *
     * @return bool
     */
    public function getWantedInformation()
    {
        return $this->wantedInformation;
    }
    /**
     * Set test
     *
     * @param boolean $test
     *
     * @return ReviewBuy
     */
    public function setTest($test)
    {
        $this->test = $test;
        return $this;
    }
    /**
     * Get test
     *
     * @return bool
     */
    public function getTest()
    {
        return $this->test;
    }
    /**
     * Set wantedEngineTest
     *
     * @param boolean $wantedEngineTest
     *
     * @return ReviewBuy
     */
    public function setWantedEngineTest($wantedEngineTest)
    {
        $this->wantedEngineTest = $wantedEngineTest;
        return $this;
    }
    /**
     * Get wantedEngineTest
     *
     * @return bool
     */
    public function getWantedEngineTest()
    {
        return $this->wantedEngineTest;
    }
    /**
     * Set fundingSolution
     *
     * @param boolean $fundingSolution
     *
     * @return ReviewBuy
     */
    public function setFundingSolution($fundingSolution)
    {
        $this->fundingSolution = $fundingSolution;
        return $this;
    }
    /**
     * Get fundingSolution
     *
     * @return bool
     */
    public function getFundingSolution()
    {
        return $this->fundingSolution;
    }
    /**
     * Set recommendProRating
     *
     * @param string $recommendProRating
     *
     * @return ReviewBuy
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
     * @return ReviewBuy
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
     * @return ReviewBuy
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
     * @return ReviewBuy
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
     * Set warranty
     *
     * @param boolean $warranty
     *
     * @return ReviewBuy
     */
    public function setWarranty($warranty)
    {
        $this->warranty = $warranty;
        return $this;
    }
    /**
     * Get warranty
     *
     * @return bool
     */
    public function getWarranty()
    {
        return $this->warranty;
    }
    /**
     * Set pro
     *
     * @param \CaradvisorBundle\Entity\Pro $pro
     *
     * @return ReviewBuy
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
     * @return ReviewBuy
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
     * @param \CaradvisorBundle\Entity\answer $answer
     *
     * @return ReviewBuy
     */
    public function setAnswer(\CaradvisorBundle\Entity\answer $answer = null)
    {
        $this->answer = $answer;
        return $this;
    }
    /**
     * Get answer
     *
     * @return \CaradvisorBundle\Entity\answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }
    /**
     * Set reviewBuyType
     *
     * @param string $reviewBuyType
     *
     * @return ReviewBuy
     */
    public function setReviewBuyType($reviewBuyType)
    {
        $this->reviewBuyType = $reviewBuyType;
        return $this;
    }
    /**
     * Get reviewBuyType
     *
     * @return string
     */
    public function getReviewBuyType()
    {
        return $this->reviewBuyType;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return ReviewBuy
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
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
}
