<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActivityRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"activity" = "Activity", "cycling" = "Cycling"})
 */
class Activity
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
     * @ORM\Column(name="avg_hr", type="decimal", precision=4, scale=1, nullable=true)
     */
    private $avgHr;

    /**
     * @var int
     *
     * @ORM\Column(name="avg_temp", type="decimal", precision=3, scale=1, nullable=true)
     */
    private $avgTemp;

    /**
     * @var string
     *
     * @ORM\Column(name="avg_speed", type="decimal", precision=7, scale=3, nullable=true)
     */
    private $avgSpeed;

    /**
     * @var string
     *
     * @ORM\Column(name="calories", type="decimal", precision=6, scale=1, nullable=true)
     */
    private $calories;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="device", type="string", length=255, nullable=true)
     */
    private $device;

    /**
     * @var string
     *
     * @ORM\Column(name="distance", type="decimal", precision=9, scale=4, nullable=true)
     */
    private $distance;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="elapsed_time", type="time")
     */
    private $elapsedTime;

    /**
     * @var string
     *
     * @ORM\Column(name="gear", type="string", length=255, nullable=true)
     */
    private $gear;

    /**
     * @ORM\Column(name="is_commute", type="boolean")
     */
    private $isCommmute;

    /**
     * @ORM\Column(name="is_manual", type="boolean")
     */
    private $isManual;

    /**
     * @ORM\Column(name="is_trainer", type="boolean")
     */
    private $isTrainer;

    /**
     * @var int
     *
     * @ORM\Column(name="max_hr", type="integer", nullable=true)
     */
    private $maxHr;

    /**
     * @var string
     *
     * @ORM\Column(name="max_speed", type="decimal", precision=7, scale=3, nullable=true)
     */
    private $maxSpeed;

    /**
     * @var int
     *
     * @ORM\Column(name="max_temp", type="integer", nullable=true)
     */
    private $maxTemp;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="moving_time", type="time")
     */
    private $movingTime;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="start_date", type="datetime")
     */
    private $startDate;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="workout_type", type="string", length=255)
     */
    private $workoutType;


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
     * Set avgHr
     *
     * @param string $avgHr
     *
     * @return Activity
     */
    public function setAvgHr($avgHr)
    {
        $this->avgHr = $avgHr;

        return $this;
    }

    /**
     * Get avgHr
     *
     * @return string
     */
    public function getAvgHr()
    {
        return $this->avgHr;
    }

    /**
     * Set avgTemp
     *
     * @param string $avgTemp
     *
     * @return Activity
     */
    public function setAvgTemp($avgTemp)
    {
        $this->avgTemp = $avgTemp;

        return $this;
    }

    /**
     * Get avgTemp
     *
     * @return string
     */
    public function getAvgTemp()
    {
        return $this->avgTemp;
    }

    /**
     * Set avgSpeed
     *
     * @param string $avgSpeed
     *
     * @return Activity
     */
    public function setAvgSpeed($avgSpeed)
    {
        $this->avgSpeed = $avgSpeed;

        return $this;
    }

    /**
     * Get avgSpeed
     *
     * @return string
     */
    public function getAvgSpeed()
    {
        return $this->avgSpeed;
    }

    /**
     * Set calories
     *
     * @param string $calories
     *
     * @return Activity
     */
    public function setCalories($calories)
    {
        $this->calories = $calories;

        return $this;
    }

    /**
     * Get calories
     *
     * @return string
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Activity
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
     * Set device
     *
     * @param string $device
     *
     * @return Activity
     */
    public function setDevice($device)
    {
        $this->device = $device;

        return $this;
    }

    /**
     * Get device
     *
     * @return string
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * Set distance
     *
     * @param string $distance
     *
     * @return Activity
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return string
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set elapsedTime
     *
     * @param \DateTime $elapsedTime
     *
     * @return Activity
     */
    public function setElapsedTime($elapsedTime)
    {
        $this->elapsedTime = $elapsedTime;

        return $this;
    }

    /**
     * Get elapsedTime
     *
     * @return \DateTime
     */
    public function getElapsedTime()
    {
        return $this->elapsedTime;
    }

    /**
     * Set gear
     *
     * @param string $gear
     *
     * @return Activity
     */
    public function setGear($gear)
    {
        $this->gear = $gear;

        return $this;
    }

    /**
     * Get gear
     *
     * @return string
     */
    public function getGear()
    {
        return $this->gear;
    }

    /**
     * Set isCommmute
     *
     * @param \bool $isCommmute
     *
     * @return Activity
     */
    public function setIsCommmute(bool $isCommmute)
    {
        $this->isCommmute = $isCommmute;

        return $this;
    }

    /**
     * Get isCommmute
     *
     * @return \bool
     */
    public function getIsCommmute()
    {
        return $this->isCommmute;
    }

    /**
     * Set isManual
     *
     * @param \bool $isManual
     *
     * @return Activity
     */
    public function setIsManual(bool $isManual)
    {
        $this->isManual = $isManual;

        return $this;
    }

    /**
     * Get isManual
     *
     * @return \bool
     */
    public function getIsManual()
    {
        return $this->isManual;
    }

    /**
     * Set isTrainer
     *
     * @param \bool $isTrainer
     *
     * @return Activity
     */
    public function setIsTrainer(bool $isTrainer)
    {
        $this->isTrainer = $isTrainer;

        return $this;
    }

    /**
     * Get isTrainer
     *
     * @return \bool
     */
    public function getIsTrainer()
    {
        return $this->isTrainer;
    }

    /**
     * Set maxHr
     *
     * @param integer $maxHr
     *
     * @return Activity
     */
    public function setMaxHr($maxHr)
    {
        $this->maxHr = $maxHr;

        return $this;
    }

    /**
     * Get maxHr
     *
     * @return integer
     */
    public function getMaxHr()
    {
        return $this->maxHr;
    }

    /**
     * Set maxSpeed
     *
     * @param string $maxSpeed
     *
     * @return Activity
     */
    public function setMaxSpeed($maxSpeed)
    {
        $this->maxSpeed = $maxSpeed;

        return $this;
    }

    /**
     * Get maxSpeed
     *
     * @return string
     */
    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }

    /**
     * Set maxTemp
     *
     * @param integer $maxTemp
     *
     * @return Activity
     */
    public function setMaxTemp($maxTemp)
    {
        $this->maxTemp = $maxTemp;

        return $this;
    }

    /**
     * Get maxTemp
     *
     * @return integer
     */
    public function getMaxTemp()
    {
        return $this->maxTemp;
    }

    /**
     * Set movingTime
     *
     * @param \DateTime $movingTime
     *
     * @return Activity
     */
    public function setMovingTime($movingTime)
    {
        $this->movingTime = $movingTime;

        return $this;
    }

    /**
     * Get movingTime
     *
     * @return \DateTime
     */
    public function getMovingTime()
    {
        return $this->movingTime;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Activity
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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Activity
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Activity
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Activity
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set workoutType
     *
     * @param string $workoutType
     *
     * @return Activity
     */
    public function setWorkoutType($workoutType)
    {
        $this->workoutType = $workoutType;

        return $this;
    }

    /**
     * Get workoutType
     *
     * @return string
     */
    public function getWorkoutType()
    {
        return $this->workoutType;
    }
}
