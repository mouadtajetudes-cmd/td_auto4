<?php

namespace App\Tests;

use App\Entity\Batiment;
use App\Entity\Utilisateurs;
use PHPUnit\Framework\TestCase;

class UtilisateurTest extends TestCase
{
    public function testCreationUtilisateur(): void
    {
        $utilisateur= new Utilisateurs();
        $utilisateur->setName('Utilisateur Test');
        $this->assertEquals('Utilisateur Test', $utilisateur->getName());
    }
    public function testModificationUtilisateur(): void
    {
        $utilisateur= new Utilisateurs();
        $utilisateur->setName('Utilisateur Initial');
        $utilisateur->setName('Utilisateur Modifié');
        $this->assertEquals('Utilisateur Modifié', $utilisateur->getName());
    }
    public function testUtilisateurVide(): void
    {
        $utilisateur= new Utilisateurs();
        $this->assertNull($utilisateur->getName());
    }
    public function testUtilisateurBatiment(): void
    {
        $utilisateur= new Utilisateurs();
        $this->assertNull($utilisateur->getBatiment());
    }
    public function testAssignationBatiment(): void
    {
        $batiment= new Batiment();
        $batiment->setNom('Batiment Test');

        $utilisateur= new Utilisateurs();
        $utilisateur->setBatiment($batiment);

        $this->assertEquals('Batiment Test', $utilisateur->getBatiment()->getNom());
    }
}
