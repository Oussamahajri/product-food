<?php
namespace App\Test\Entity;
use App\Entity\CompteBancare;
use PHPUnit\Framework\TestCase;
class CompteBancareTest extends TestCase{  
public function testCompteBancare(){
        $c=new CompteBancare('123456789','oussama',1000);
        $solde=$c->getSolde();
        $this->assertSame(1000,$solde);
    }
public function testInvalidCompteBancare() {
        $c = new CompteBancare('invalid', 'invalid', -100);
        $this->expectException("Exception");
        $c->retire(500);
    }

}