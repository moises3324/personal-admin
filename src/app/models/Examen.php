<?php

class Examen
{
    private int $id;
    private string $fecha_vencimiento;
    private int $tipo_examen_id;
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
    public function getFechaVencimiento(): string
    {
        return $this->fecha_vencimiento;
    }

    /**
     * @param string $fecha_vencimiento
     */
    public function setFechaVencimiento(string $fecha_vencimiento): void
    {
        $this->fecha_vencimiento = $fecha_vencimiento;
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