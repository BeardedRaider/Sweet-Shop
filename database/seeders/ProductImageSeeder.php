<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $images = [
            [1, 'chocolate-fudge.jpg', 'Chocolate Fudge'],
            [2, 'sour-gummies.jpg', 'Sour Gummies'],
            [3, 'mint-humbugs.jpg', 'Mint Humbugs'],
            [4, 'jelly-beans.jpg', 'Jelly Beans'],
            [5, 'toffee-bars.jpg', 'Toffee Bars'],
            [6, 'lemon-drops.jpg', 'Lemon Drops'],
            [7, 'candy-canes.jpg', 'Candy Canes'],
            [8, 'marshmallow-twists.jpg', 'Marshmallow Twists'],
            [9, 'liquorice-wheels.jpg', 'Liquorice Wheels'],
            [10, 'bubblegum-balls.jpg', 'Bubblegum Balls'],
        ];

        foreach ($images as [$productId, $filename, $alt]) {
            Image::create([
                'product_id' => $productId,
                'path' => "images/products/{$filename}",
                'alt_text' => $alt,
            ]);
        }
    }
}
