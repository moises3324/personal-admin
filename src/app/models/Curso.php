<?php

class Curso
{
    private int $id;
    private DateTime $date_of_expiration;
    private int $tipo_curso_id;

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
    public function getTipoCursoId(): int
    {
        return $this->tipo_curso_id;
    }

    /**
     * @param int $tipo_curso_id
     */
    public function setTipoCursoId(int $tipo_curso_id): void
    {
        $this->tipo_curso_id = $tipo_curso_id;
    }

}