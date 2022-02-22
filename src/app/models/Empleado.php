<?php

class Empleado
{
    private int $id;
    private string $rut;
    private string $nombres;
    private string $apellido_paterno;
    private string $apellido_materno;

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
    public function getNombres(): string
    {
        return $this->nombres;
    }

    /**
     * @param string $nombres
     */
    public function setNombres(string $nombres): void
    {
        $this->nombres = $nombres;
    }

    /**
     * @return string
     */
    public function getApellidoPaterno(): string
    {
        return $this->apellido_paterno;
    }

    /**
     * @param string $apellido_paterno
     */
    public function setApellidoPaterno(string $apellido_paterno): void
    {
        $this->apellido_paterno = $apellido_paterno;
    }

    /**
     * @return string
     */
    public function getApellidoMaterno(): string
    {
        return $this->apellido_materno;
    }

    /**
     * @param string $apellido_materno
     */
    public function setApellidoMaterno(string $apellido_materno): void
    {
        $this->apellido_materno = $apellido_materno;
    }
}
