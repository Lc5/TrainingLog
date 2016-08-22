<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ride
 *
 * @ORM\Table(name="ride")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RideRepository")
 */
class Ride extends Activity
{
    /**
     * @var string
     *
     * @ORM\Column(name="avg_cadence", type="decimal", precision=4, scale=1, nullable=true)
     */
    private $avgCadence;

    /**
     * @var string
     *
     * @ORM\Column(name="avg_power", type="decimal", precision=5, scale=1, nullable=true)
     */
    private $avgPower;

    /**
     * @var int
     *
     * @ORM\Column(name="intensity_factor", type="decimal", precision=3, scale=2, nullable=true)
     */
    private $intensityFactor;

    /**
     * @var int
     *
     * @ORM\Column(name="max_cadence", type="integer", nullable=true)
     */
    private $maxCadence;

    /**
     * @var int
     *
     * @ORM\Column(name="max_power", type="integer", nullable=true)
     */
    private $maxPower;

    /**
     * @var int
     *
     * @ORM\Column(name="normalized_power", type="integer", nullable=true)
     */
    private $normalizedPower;

    /**
     * @var int
     *
     * @ORM\Column(name="tss", type="integer", nullable=true)
     */
    private $tss;

    /**
     * @var string
     *
     * @ORM\Column(name="work", type="decimal", precision=6, scale=1, nullable=true)
     */
    private $work;

    /**
     * Set avgCadence
     *
     * @param string $avgCadence
     *
     * @return Ride
     */
    public function setAvgCadence($avgCadence)
    {
        $this->avgCadence = $avgCadence;

        return $this;
    }

    /**
     * Get avgCadence
     *
     * @return string
     */
    public function getAvgCadence()
    {
        return $this->avgCadence;
    }

    /**
     * Set avgPower
     *
     * @param string $avgPower
     *
     * @return Ride
     */
    public function setAvgPower($avgPower)
    {
        $this->avgPower = $avgPower;

        return $this;
    }

    /**
     * Get avgPower
     *
     * @return string
     */
    public function getAvgPower()
    {
        return $this->avgPower;
    }

    /**
     * Set intensityFactor
     *
     * @param integer $intensityFactor
     *
     * @return Ride
     */
    public function setIntensityFactor($intensityFactor)
    {
        $this->intensityFactor = $intensityFactor;

        return $this;
    }

    /**
     * Get intensityFactor
     *
     * @return int
     */
    public function getIntensityFactor()
    {
        return $this->intensityFactor;
    }

    /**
     * Set maxCadence
     *
     * @param integer $maxCadence
     *
     * @return Ride
     */
    public function setMaxCadence($maxCadence)
    {
        $this->maxCadence = $maxCadence;

        return $this;
    }

    /**
     * Get maxCadence
     *
     * @return int
     */
    public function getMaxCadence()
    {
        return $this->maxCadence;
    }

    /**
     * Set maxPower
     *
     * @param integer $maxPower
     *
     * @return Ride
     */
    public function setMaxPower($maxPower)
    {
        $this->maxPower = $maxPower;

        return $this;
    }

    /**
     * Get maxPower
     *
     * @return int
     */
    public function getMaxPower()
    {
        return $this->maxPower;
    }

    /**
     * Set normalizedPower
     *
     * @param integer $normalizedPower
     *
     * @return Ride
     */
    public function setNormalizedPower($normalizedPower)
    {
        $this->normalizedPower = $normalizedPower;

        return $this;
    }

    /**
     * Get normalizedPower
     *
     * @return int
     */
    public function getNormalizedPower()
    {
        return $this->normalizedPower;
    }

    /**
     * Set tss
     *
     * @param integer $tss
     *
     * @return Ride
     */
    public function setTss($tss)
    {
        $this->tss = $tss;

        return $this;
    }

    /**
     * Get tss
     *
     * @return int
     */
    public function getTss()
    {
        return $this->tss;
    }

    /**
     * Set work
     *
     * @param string $work
     *
     * @return Ride
     */
    public function setWork($work)
    {
        $this->work = $work;

        return $this;
    }

    /**
     * Get work
     *
     * @return string
     */
    public function getWork()
    {
        return $this->work;
    }
}
