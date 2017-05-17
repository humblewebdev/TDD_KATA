<?php
namespace TDD\Tests;

use PHPUnit\Framework\TestCase;

class SuperMarketPricingTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function testCheckoutExists()
    {
        self::assertTrue(class_exists(Checkout::class));
        self::assertTrue(class_exists(Product::class));
    }

    public function testThreeForADollar()
    {
        $defaultPrice = .50;
        $discountPrice = 1.00;
        $discountAmount = 3;
        $product = new Product();
        $product->setName('Test Product');
        $product->setPrice($defaultPrice);
        $product->discount(Product::UNIT_DISCOUNT, $discountPrice, $discountAmount);

        $cart1Amount = 4;
        $checkout = new Checkout();
        $checkout->addProduct($product, $cart1Amount);
        self::assertEquals(1.50, $checkout->total());

        $cart2Amount = 5;
        $checkout = new Checkout();
        $checkout->addProduct($product, $cart2Amount);
        self::assertEquals(2.00, $checkout->total());
    }
}