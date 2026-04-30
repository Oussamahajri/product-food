<?php
namespace App\Test\Entity;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;
class ProductTest extends TestCase{
/**
 * @dataProvider priceForFood
 */
public function testFood($prix, $expectedTva)
{
    $p = new Product('lablabi', 'food', $prix);
    $tva = $p->computeTva();

    $this->assertSame($expectedTva, $tva);
}

public static function priceForFood(){
    return [
        [10, 0.55],
        [20, 1.1],
        [50, 2.75],
    ];
}

public function testfood1(){
        $p=new Product('hrissa','fastfood',10);
        $tva=$p->computeTva();
        $this->assertSame(1.96,$tva);
    }
        public function testInvalidPrice() {
        $p = new Product('invalid', 'food', -5);
        $this->expectException("Exception");
        $p->computeTva();
    }
}

?>
