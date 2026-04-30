<?php
namespace App\Test\Entity;
use App\Entity\Personne;
use PHPUnit\Framework\TestCase;
class PersonneTest extends TestCase{
    public function testPersonne(){
        $p=new Personne('oussama','personne',25);
        $tva=$p->categorie();
        $this->assertSame('majeur',$tva);

    }
    public function testPersonne1(){
        $p=new Personne('hayfa','personne',10);
        $tva=$p->categorie();
        $this->assertSame('mineur',$tva);
    }
        public function testInvalidPersonne() {
        $p = new Personne('invalid', 'personne', -5);
        $this->expectException("Exception");
        $p->categorie();
    }
}
