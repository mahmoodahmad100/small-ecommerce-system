<?php

namespace Core\Inventory\Tests\Unit;

use Core\Inventory\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function testCategoryRelationship()
    {
        $product = new Product();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $product->category());
    }

    public function testItemsRelationship()
    {
        $product = new Product();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class, $product->items());
    }

    public function testBootedMethodAddsGlobalScopes()
    {
        $product = new Product();
        $reflection = new \ReflectionClass($product);
        $method = $reflection->getMethod('booted');
        $method->setAccessible(true);
        $method->invoke(null);

        $globalScopes = $product->getGlobalScopes();
        $this->assertArrayHasKey('Core\Inventory\Models\Scopes\CategoriesScope', $globalScopes);
        $this->assertArrayHasKey('Core\Inventory\Models\Scopes\ContentScope', $globalScopes);
        $this->assertArrayHasKey('Core\Inventory\Models\Scopes\RangeScope', $globalScopes);
    }
}
