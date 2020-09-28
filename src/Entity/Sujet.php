<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sujet
 *
 * @ORM\Table(name="sujet", indexes={@ORM\Index(name="fk_premier_msg", columns={"fk_premier_msg"}), @ORM\Index(name="fk_user", columns={"fk_user"})})
 * @ORM\Entity
 */
class Sujet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @return int|null
     */
    public function getFkUser(): ?int
    {
        return $this->fkUser;
    }

    /**
     * @param int|null $fkUser
     */
    public function setFkUser(?int $fkUser): void
    {
        $this->fkUser = $fkUser;
    }

    /**
     * @return string|null
     */
    public function getTitre(): ?string
    {
        return $this->titre;
    }

    /**
     * @param string|null $titre
     */
    public function setTitre(?string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return int|null
     */
    public function getFkPremierMsg(): ?int
    {
        return $this->fkPremierMsg;
    }

    /**
     * @param int|null $fkPremierMsg
     */
    public function setFkPremierMsg(?int $fkPremierMsg): void
    {
        $this->fkPremierMsg = $fkPremierMsg;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateCre(): ?\DateTime
    {
        return $this->dateCre;
    }

    /**
     * @param \DateTime|null $dateCre
     */
    public function setDateCre(?\DateTime $dateCre): void
    {
        $this->dateCre = $dateCre;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateMaj(): ?\DateTime
    {
        return $this->dateMaj;
    }

    /**
     * @param \DateTime|null $dateMaj
     */
    public function setDateMaj(?\DateTime $dateMaj): void
    {
        $this->dateMaj = $dateMaj;
    }

    /**
     * @return int|null
     */
    public function getFkCategorie(): ?int
    {
        return $this->fkCategorie;
    }

    /**
     * @param int|null $fkCategorie
     */
    public function setFkCategorie(?int $fkCategorie): void
    {
        $this->fkCategorie = $fkCategorie;
    }



    /**
     * @var int|null
     *
     * @ORM\Column(name="fk_user", type="integer", nullable=true)
     */
    private $fkUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titre", type="string", length=100, nullable=true)
     */
    private $titre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fk_premier_msg", type="integer", nullable=true)
     */
    private $fkPremierMsg;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_cre", type="datetime", nullable=true)
     */
    private $dateCre;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_maj", type="datetime", nullable=true)
     */
    private $dateMaj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fk_categorie", type="integer", nullable=true)
     */
    private $fkCategorie;




}
