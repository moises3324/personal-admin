<?php

class Empleado
{
    private int $id;
    private string $rut;
    private string $names;
    private string $father_last_name;
    private string $mother_last_name;
    private DateTime $date_of_birth;
    private string $epp;
    private string $observation;
    private int $contratacion_id;
    private int $centro_cosoto_id;

    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getRut(): string
    {
        return $this->rut;
    }

    /**
     * @param string $rut
     */
    public function setRut(string $rut): void
    {
        $this->rut = $rut;
    }

    /**
     * @return string
     */
    public function getNames(): string
    {
        return $this->names;
    }

    /**
     * @param string $names
     */
    public function setNames(string $names): void
    {
        $this->names = $names;
    }

    /**
     * @return string
     */
    public function getFatherLastName(): string
    {
        return $this->father_last_name;
    }

    /**
     * @param string $father_last_name
     */
    public function setFatherLastName(string $father_last_name): void
    {
        $this->father_last_name = $father_last_name;
    }

    /**
     * @return string
     */
    public function getMotherLastName(): string
    {
        return $this->mother_last_name;
    }

    /**
     * @param string $mother_last_name
     */
    public function setMotherLastName(string $mother_last_name): void
    {
        $this->mother_last_name = $mother_last_name;
    }

    /**
     * @return DateTime
     */
    public function getDateOfBirth(): DateTime
    {
        return $this->date_of_birth;
    }

    /**
     * @param DateTime $date_of_birth
     */
    public function setDateOfBirth(DateTime $date_of_birth): void
    {
        $this->date_of_birth = $date_of_birth;
    }

    /**
     * @return string
     */
    public function getEpp(): string
    {
        return $this->epp;
    }

    /**
     * @param string $epp
     */
    public function setEpp(string $epp): void
    {
        $this->epp = $epp;
    }

    /**
     * @return string
     */
    public function getObservation(): string
    {
        return $this->observation;
    }

    /**
     * @param string $observation
     */
    public function setObservation(string $observation): void
    {
        $this->observation = $observation;
    }

    /**
     * @return int
     */
    public function getContratacionId(): int
    {
        return $this->contratacion_id;
    }

    /**
     * @param int $contratacion_id
     */
    public function setContratacionId(int $contratacion_id): void
    {
        $this->contratacion_id = $contratacion_id;
    }

    /**
     * @return int
     */
    public function getCentroCosotoId(): int
    {
        return $this->centro_cosoto_id;
    }

    /**
     * @param int $centro_cosoto_id
     */
    public function setCentroCosotoId(int $centro_cosoto_id): void
    {
        $this->centro_cosoto_id = $centro_cosoto_id;
    }

}