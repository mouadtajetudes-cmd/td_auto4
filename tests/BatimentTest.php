<?php

namespace App\Tests;

use App\Entity\Batiment;
use PHPUnit\Framework\TestCase;

class BatimentTest extends TestCase
{
    public function testCreationBatiment(): void
    {
        $batiment= new Batiment();
        $batiment->setNom('Batiment Test');
        $this->assertEquals('Batiment Test', $batiment->getNom());
    }
    public function testModificationBatiment(): void
    {
        $batiment= new Batiment();
        $batiment->setNom('Batiment Initial');
        $batiment->setNom('Batiment Modifié');
        $this->assertEquals('Batiment Modifié', $batiment->getNom());
    }
    public function testBatimentVide(): void
    {
        $batiment= new Batiment();
        $this->assertNull($batiment->getNom());
    }   
}
