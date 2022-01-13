<?php

class Contratacion
{
    private int $id;
    private DateTime $start_date;
    private DateTime $end_date;
    private int $tipo_contrato_id;

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
    public function getStartDate(): DateTime
    {
        return $this->start_date;
    }

    /**
     * @param DateTime $start_date
     */
    public function setStartDate(DateTime $start_date): void
    {
        $this->start_date = $start_date;
    }

    /**
     * @return DateTime
     */
    public function getEndDate(): DateTime
    {
        return $this->end_date;
    }

    /**
     * @param DateTime $end_date
     */
    public function setEndDate(DateTime $end_date): void
    {
        $this->end_date = $end_date;
    }

    /**
     * @return int
     */
    public function getTipoContratoId(): int
    {
        return $this->tipo_contrato_id;
    }

    /**
     * @param int $tipo_contrato_id
     */
    public function setTipoContratoId(int $tipo_contrato_id): void
    {
        $this->tipo_contrato_id = $tipo_contrato_id;
    }

}