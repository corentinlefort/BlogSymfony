<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity
 */
class Message
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
     * @var int|null
     *
     * @ORM\Column(name="fk_user", type="integer", nullable=true)
     */
    private $fkUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="corps", type="string", length=500, nullable=true)
     */
    private $corps;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_cre", type="datetime", nullable=true)
     */
    private $dateCre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fk_sujet", type="integer", nullable=true)
     */
    private $fkSujet;

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
    public function getCorps(): ?string
    {
        return $this->corps;
    }

    /**
     * @param string|null $corps
     */
    public function setCorps(?string $corps): void
    {
        $this->corps = $corps;
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
     * @return int|null
     */
    public function getFkSujet(): ?int
    {
        return $this->fkSujet;
    }

    /**
     * @param int|null $fkSujet
     */
    public function setFkSujet(?int $fkSujet): void
    {
        $this->fkSujet = $fkSujet;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="pseudo_user", type="string", length=500, nullable=true)
     */
    private $pseudoUser;

    /**
     * @return string|null
     */
    public function getPseudoUser(): ?string
    {
        return $this->pseudoUser;
    }

    /**
     * @param string|null $pseudoUser
     */
    public function setPseudoUser(?string $pseudoUser): void
    {
        $this->pseudoUser = $pseudoUser;
    }


}
