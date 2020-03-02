<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActividadRepository")
 */
class Actividad
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="Proyecto",inverserdBy="actividades")
     * 
     */
    private $id_Proyecto;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario",inversedBy="actividades ")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $id_Usuario;

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

    public function getIdProyecto(): ?int
    {
        return $this->id_Proyecto;
    }

    public function setIdProyecto(int $id_Proyecto): self
    {
        $this->id_Proyecto = $id_Proyecto;

        return $this;
    }

    public function getIdUsuario(): ?int
    {
        return $this->id_Usuario;
    }

    public function setIdUsuario(int $id_Usuario): self
    {
        $this->id_Usuario = $id_Usuario;

        return $this;
    }
}
