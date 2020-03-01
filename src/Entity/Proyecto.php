<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProyectoRepository")
 */
class Proyecto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_Inicio;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha_Finalizacion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $top;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fecha_Inicio;
    }

    public function setFechaInicio(\DateTimeInterface $fecha_Inicio): self
    {
        $this->fecha_Inicio = $fecha_Inicio;

        return $this;
    }

    public function getFechaFinalizacion(): ?\DateTimeInterface
    {
        return $this->fecha_Finalizacion;
    }

    public function setFechaFinalizacion(?\DateTimeInterface $fecha_Finalizacion): self
    {
        $this->fecha_Finalizacion = $fecha_Finalizacion;

        return $this;
    }

    public function getTop(): ?bool
    {
        return $this->top;
    }

    public function setTop(bool $top): self
    {
        $this->top = $top;

        return $this;
    }
}
