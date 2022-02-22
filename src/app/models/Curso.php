<?php

class Curso
{
    private int $id;
    private string $fecha_vencimiento;
    private int $tipo_curso_id;
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
        $this->tipo_curso_id = $empleado_id;
    }
}