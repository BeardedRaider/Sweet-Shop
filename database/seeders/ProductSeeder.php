<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['Chocolate Fudge', 'Rich and creamy fudge.', 2.99, 50],
            ['Sour Gummies', 'Tangy and chewy sweets.', 1.49, 100],
            ['Mint Humbugs', 'Classic minty treats.', 1.99, 75],
            ['Jelly Beans', 'Colorful and fruity.', 2.49, 60],
            ['Toffee Bars', 'Sticky and sweet.', 1.79, 40],
            ['Lemon Drops', 'Sharp citrus sweets.', 1.29, 90],
            ['Candy Canes', 'Festive peppermint sticks.', 2.99, 30],
            ['Marshmallow Twists', 'Soft and fluffy.', 1.99, 80],
            ['Liquorice Wheels', 'Bold and chewy.', 2.49, 35],
            ['Bubblegum Balls', 'Classic bubblegum flavour.', 1.59, 120],
        ];

        // Insert a set of sample products used for development and testing.
        // These are simple fixtures — in larger projects you might use
        // factories to generate more diverse data.
        foreach ($products as [$name, $desc, $price, $stock]) {
            Product::create([
                'name' => $name,
                'description' => $desc,
                'price' => $price,
                'stock' => $stock,
            ]);
        }
    }
}

