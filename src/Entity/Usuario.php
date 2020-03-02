<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario implements UserInterface, \Serializable
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
     * @ORM\Column(type="string", length=50)
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $sexo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $correo;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $password;

    /**
     * @ORM\Column(type="integer")
     */
    private $rol;

    /**
     * @ORM\OneToMany(targetEntity="Actividad",mappedBy="proyecto")
     */
    private $actividades;

    public function __construct(){

        $this->$actividades = new ArrayCollection();
    }

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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRol(): ?int
    {
        return $this->rol;
    }

    public function setRol(int $rol): self
    {
        $this->rol = $rol;

        return $this;
    }

    public function getRoles(){

        return array('ROLE_USER');

    }

    /**
     * @see \Serializable::serialize()
     */

     public function serialize()
     {

        return serialize(array(
            $this->id,
            $this->password));
     }

     /**
     * @see \Serializable::unserialize()
     */
     public function unserialize($serialized){

        list($this->id, $this->password) = unserialize($serialized, ['allowed_classes'=>false]);

     }
}
