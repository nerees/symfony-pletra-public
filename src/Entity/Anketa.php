<?php

namespace App\Entity;

use App\Repository\AnketaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnketaRepository::class)
 */
class Anketa
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
    private $user_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lng;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $viens_du;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $viens_trys;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $viens_keturi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $viens_penki;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $du_viens;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $du_du;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $du_trys;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $du_keturi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_viens;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $trys_viens_size;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_viens_pastabos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_du;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_du_pastabos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_trys;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_trys_pastabos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_keturi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_keturi_pastabos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_penki;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_penki_pastabos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_sesi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_sesi_pastabos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_septyni_viens;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $trys_septyni_viens_km;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_septyni_du;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $trys_septyni_du_km;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_septyni_trys;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $trys_septyni_trys_km;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_septyni_keturi;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $trys_septyni_keturi_km;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trys_septyni_pastabos;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getLat(): ?string
    {
        return $this->lat;
    }

    public function setLat(string $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?string
    {
        return $this->lng;
    }

    public function setLng(string $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    public function getViensDu(): ?string
    {
        return $this->viens_du;
    }

    public function setViensDu(?string $viens_du): self
    {
        $this->viens_du = $viens_du;

        return $this;
    }

    public function getViensTrys(): ?string
    {
        return $this->viens_trys;
    }

    public function setViensTrys(?string $viens_trys): self
    {
        $this->viens_trys = $viens_trys;

        return $this;
    }

    public function getViensKeturi(): ?string
    {
        return $this->viens_keturi;
    }

    public function setViensKeturi(?string $viens_keturi): self
    {
        $this->viens_keturi = $viens_keturi;

        return $this;
    }

    public function getViensPenki(): ?string
    {
        return $this->viens_penki;
    }

    public function setViensPenki(?string $viens_penki): self
    {
        $this->viens_penki = $viens_penki;

        return $this;
    }

    public function getDuViens(): ?string
    {
        return $this->du_viens;
    }

    public function setDuViens(?string $du_viens): self
    {
        $this->du_viens = $du_viens;

        return $this;
    }

    public function getDuDu(): ?string
    {
        return $this->du_du;
    }

    public function setDuDu(?string $du_du): self
    {
        $this->du_du = $du_du;

        return $this;
    }

    public function getDuTrys(): ?string
    {
        return $this->du_trys;
    }

    public function setDuTrys(?string $du_trys): self
    {
        $this->du_trys = $du_trys;

        return $this;
    }

    public function getDuKeturi(): ?string
    {
        return $this->du_keturi;
    }

    public function setDuKeturi(?string $du_keturi): self
    {
        $this->du_keturi = $du_keturi;

        return $this;
    }

    public function getTrysViens(): ?string
    {
        return $this->trys_viens;
    }

    public function setTrysViens(?string $trys_viens): self
    {
        $this->trys_viens = $trys_viens;

        return $this;
    }

    public function getTrysViensSize(): ?int
    {
        return $this->trys_viens_size;
    }

    public function setTrysViensSize(?int $trys_viens_size): self
    {
        $this->trys_viens_size = $trys_viens_size;

        return $this;
    }

    public function getTrysViensPastabos(): ?string
    {
        return $this->trys_viens_pastabos;
    }

    public function setTrysViensPastabos(?string $trys_viens_pastabos): self
    {
        $this->trys_viens_pastabos = $trys_viens_pastabos;

        return $this;
    }

    public function getTrysDu(): ?string
    {
        return $this->trys_du;
    }

    public function setTrysDu(?string $trys_du): self
    {
        $this->trys_du = $trys_du;

        return $this;
    }

    public function getTrysDuPastabos(): ?string
    {
        return $this->trys_du_pastabos;
    }

    public function setTrysDuPastabos(?string $trys_du_pastabos): self
    {
        $this->trys_du_pastabos = $trys_du_pastabos;

        return $this;
    }

    public function getTrysTrys(): ?string
    {
        return $this->trys_trys;
    }

    public function setTrysTrys(?string $trys_trys): self
    {
        $this->trys_trys = $trys_trys;

        return $this;
    }

    public function getTrysTrysPastabos(): ?string
    {
        return $this->trys_trys_pastabos;
    }

    public function setTrysTrysPastabos(?string $trys_trys_pastabos): self
    {
        $this->trys_trys_pastabos = $trys_trys_pastabos;

        return $this;
    }

    public function getTrysKeturi(): ?string
    {
        return $this->trys_keturi;
    }

    public function setTrysKeturi(?string $trys_keturi): self
    {
        $this->trys_keturi = $trys_keturi;

        return $this;
    }

    public function getTrysKeturiPastabos(): ?string
    {
        return $this->trys_keturi_pastabos;
    }

    public function setTrysKeturiPastabos(?string $trys_keturi_pastabos): self
    {
        $this->trys_keturi_pastabos = $trys_keturi_pastabos;

        return $this;
    }

    public function getTrysPenki(): ?string
    {
        return $this->trys_penki;
    }

    public function setTrysPenki(?string $trys_penki): self
    {
        $this->trys_penki = $trys_penki;

        return $this;
    }

    public function getTrysPenkiPastabos(): ?string
    {
        return $this->trys_penki_pastabos;
    }

    public function setTrysPenkiPastabos(?string $trys_penki_pastabos): self
    {
        $this->trys_penki_pastabos = $trys_penki_pastabos;

        return $this;
    }

    public function getTrysSesi(): ?string
    {
        return $this->trys_sesi;
    }

    public function setTrysSesi(?string $trys_sesi): self
    {
        $this->trys_sesi = $trys_sesi;

        return $this;
    }

    public function getTrysSesiPastabos(): ?string
    {
        return $this->trys_sesi_pastabos;
    }

    public function setTrysSesiPastabos(?string $trys_sesi_pastabos): self
    {
        $this->trys_sesi_pastabos = $trys_sesi_pastabos;

        return $this;
    }

    public function getTrysSeptyniViens(): ?string
    {
        return $this->trys_septyni_viens;
    }

    public function setTrysSeptyniViens(?string $trys_septyni_viens): self
    {
        $this->trys_septyni_viens = $trys_septyni_viens;

        return $this;
    }

    public function getTrysSeptyniViensKm(): ?int
    {
        return $this->trys_septyni_viens_km;
    }

    public function setTrysSeptyniViensKm(?int $trys_septyni_viens_km): self
    {
        $this->trys_septyni_viens_km = $trys_septyni_viens_km;

        return $this;
    }

    public function getTrysSeptyniDu(): ?string
    {
        return $this->trys_septyni_du;
    }

    public function setTrysSeptyniDu(?string $trys_septyni_du): self
    {
        $this->trys_septyni_du = $trys_septyni_du;

        return $this;
    }

    public function getTrysSeptyniDuKm(): ?int
    {
        return $this->trys_septyni_du_km;
    }

    public function setTrysSeptyniDuKm(?int $trys_septyni_du_km): self
    {
        $this->trys_septyni_du_km = $trys_septyni_du_km;

        return $this;
    }

    public function getTrysSeptyniTrys(): ?string
    {
        return $this->trys_septyni_trys;
    }

    public function setTrysSeptyniTrys(?string $trys_septyni_trys): self
    {
        $this->trys_septyni_trys = $trys_septyni_trys;

        return $this;
    }

    public function getTrysSeptyniTrysKm(): ?int
    {
        return $this->trys_septyni_trys_km;
    }

    public function setTrysSeptyniTrysKm(?int $trys_septyni_trys_km): self
    {
        $this->trys_septyni_trys_km = $trys_septyni_trys_km;

        return $this;
    }

    public function getTrysSeptyniKeturi(): ?string
    {
        return $this->trys_septyni_keturi;
    }

    public function setTrysSeptyniKeturi(?string $trys_septyni_keturi): self
    {
        $this->trys_septyni_keturi = $trys_septyni_keturi;

        return $this;
    }

    public function getTrysSeptyniKeturiKm(): ?int
    {
        return $this->trys_septyni_keturi_km;
    }

    public function setTrysSeptyniKeturiKm(?int $trys_septyni_keturi_km): self
    {
        $this->trys_septyni_keturi_km = $trys_septyni_keturi_km;

        return $this;
    }

    public function getTrysSeptyniPastabos(): ?string
    {
        return $this->trys_septyni_pastabos;
    }

    public function setTrysSeptyniPastabos(?string $trys_septyni_pastabos): self
    {
        $this->trys_septyni_pastabos = $trys_septyni_pastabos;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }
}
