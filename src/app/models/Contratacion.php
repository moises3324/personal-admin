<?php

class Contratacion
{
    private int $id;
    private string $start_date;
    private string $end_date;
    private int $tipo_contrato_id;
    private int $centro_costo_id;
    private int $empleado_id;

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
    public function getStartDate(): string
    {
        return $this->start_date;
    }

    /**
     * @param string $start_date
     */
    public function setStartDate(string $start_date): void
    {
        $this->start_date = $start_date;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->end_date;
    }

    /**
     * @param string $end_date
     */
    public function setEndDate(string $end_date): void
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

    /**
     * @return int
     */
    public function getCentroCostoId(): int
    {
        return $this->centro_costo_id;
    }

    /**
     * @param int $centro_costo_id
     */
    public function setCentoCostoid(int $centro_costo_id): void
    {
        $this->centro_costo_id = $centro_costo_id;
    }

    /**
     * @return int
     */
    public function getEmpleadoId(): int
    {
        return $this->empleado_id;
    }

    /**
     * @param int $empleado_id
     */
    public function setEmpleadoId(int $empleado_id): void
    {
        $this->empleado_id = $empleado_id;
    }
}