<?php

class Empleado
{
    private int $id;
    private string $rut;
    private string $names;
    private string $father_last_name;
    private string $mother_last_name;
    private string $date_of_birth;

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
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->date_of_birth;
    }

    /**
     * @param string $date_of_birth
     */
    public function setDateOfBirth(string $date_of_birth): void
    {
        $this->date_of_birth = $date_of_birth;
    }
}
