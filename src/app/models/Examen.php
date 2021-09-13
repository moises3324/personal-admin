<?php

class Examen
{
    private int $id;
    private DateTime $date_of_expiration;
    private int $tipo_examen_id;

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
     * @return DateTime
     */
    public function getDateOfExpiration(): DateTime
    {
        return $this->date_of_expiration;
    }

    /**
     * @param DateTime $date_of_expiration
     */
    public function setDateOfExpiration(DateTime $date_of_expiration): void
    {
        $this->date_of_expiration = $date_of_expiration;
    }

    /**
     * @return int
     */
    public function getTipoExamenId(): int
    {
        return $this->tipo_examen_id;
    }

    /**
     * @param int $tipo_examen_id
     */
    public function setTipoExamenId(int $tipo_examen_id): void
    {
        $this->tipo_examen_id = $tipo_examen_id;
    }

}