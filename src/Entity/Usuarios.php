<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuariosRepository::class)
 */
class Usuarios
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuario_k;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuario_a;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\ManyToMany(targetEntity=Dispositivos::class, inversedBy="usuarios")
     * @ORM\JoinTable(name="usuarios_dispositivos",
     * joinColumns={@ORM\JoinColumn(name="usuarios_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="dispositivos_id", referencedColumnName="id")}
     * )
     */
    private $UsuDisp;

    public function __construct()
    {
        $this->UsuDisp = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUsuarioK(): ?int
    {
        return $this->id_usuario_k;
    }

    public function setIdUsuarioK(int $id_usuario_k): self
    {
        $this->id_usuario_k = $id_usuario_k;

        return $this;
    }

    public function getIdUsuarioA(): ?int
    {
        return $this->id_usuario_a;
    }

    public function setIdUsuarioA(int $id_usuario_a): self
    {
        $this->id_usuario_a = $id_usuario_a;

        return $this;
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

    /**
     * @return Collection|Dispositivos[]
     */
    public function getUsuDisp(): Collection
    {
        return $this->UsuDisp;
    }

    public function addUsuDisp(Dispositivos $usuDisp): self
    {
        if (!$this->UsuDisp->contains($usuDisp)) {
            $this->UsuDisp[] = $usuDisp;
        }

        return $this;
    }

    public function removeUsuDisp(Dispositivos $usuDisp): self
    {
        $this->UsuDisp->removeElement($usuDisp);

        return $this;
    }
}
