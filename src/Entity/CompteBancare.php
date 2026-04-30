<?php

namespace App\Entity;

use App\Repository\CompteBancareRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteBancareRepository::class)]
class CompteBancare
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $accountNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $proprietaire = null;

    #[ORM\Column(type: 'integer')]
    private int $solde = 0;

    public function __construct(string $accountNumber, string $proprietaire, int $solde)
    {
        $this->accountNumber = $accountNumber;
        $this->proprietaire = $proprietaire;
        $this->solde = $solde;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompteBancare(): ?string
    {
        return $this->accountNumber;
    }

    public function setCompteBancare(string $CompteBancare): static
    {
        $this->accountNumber = $CompteBancare;

        return $this;
    }

    public function getSolde(): int
    {
        return $this->solde;
    }

    public function retire(int $montant): void
    {
        if ($montant <= 0) {
            throw new \Exception('Montant invalide pour retrait');
        }

        if ($montant > $this->solde) {
            throw new \Exception('Solde insuffisant');
        }

        $this->solde -= $montant;
    }
}
