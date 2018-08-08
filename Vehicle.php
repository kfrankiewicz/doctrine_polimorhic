<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vehicle")
 */
class Vehicle
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id", nullable=true)
     */
    private $person;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Vehicle
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerType()
    {
        return $this->ownerType;
    }

    /**
     * @param mixed $ownerType
     * @return Vehicle
     */
    public function setOwnerType($ownerType)
    {
        $this->ownerType = $ownerType;
        return $this;
    }

    /**
     * @param VehicleOwnerInterface $owner
     * @return Vehicle
     */
    public function setOwner(VehicleOwnerInterface $owner)
    {
        if ($owner instanceof Company) {
            $this->company = $owner;
        } else {
            $this->person = $owner;
        }

        return $this;
    }

    /**
     * @return VehicleOwnerInterface|null
     */
    public function getOwner()
    {
        return $this->company ?? $this->person ?? null;
    }
}