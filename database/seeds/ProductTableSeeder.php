<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'imagePath'=>'https://pbs.twimg.com/media/CokbYlAUkAAlzRh.jpg:large',
            'title'=>'Product001',
            'description'=>'Lorem ipsum dolor sit amet, mauris elit libero, lacus volutpat, eu consectetuer justo eu pellentesque. Impedit vestibulum donec, vivamus mi, ut pellentesque porta justo enim eu, in porttitor massa enim inceptos non sed. Ultricies velit. In ut, rhoncus mi facilisis, tellus diam consectetuer mi vestibulum ipsum platea, nec quis elit et id sem vero.',
            'price'=>'1000',
        ]);
        $product->save();
        $product = new Product([
            'imagePath'=>'https://pbs.twimg.com/media/CnR7CPcUIAEmndN.jpg:large',
            'title'=>'Product002',
            'description'=>'Lorem ipsum dolor sit amet, mauris elit libero, lacus volutpat, eu consectetuer justo eu pellentesque. Impedit vestibulum donec, vivamus mi, ut pellentesque porta justo enim eu, in porttitor massa enim inceptos non sed. Ultricies velit. In ut, rhoncus mi facilisis, tellus diam consectetuer mi vestibulum ipsum platea, nec quis elit et id sem vero.',
            'price'=>'1000',
        ]);
        $product->save();
        $product = new Product([
            'imagePath'=>'https://pbs.twimg.com/media/CudgaqRVYAAA1_O.jpg',
            'title'=>'Product003',
            'description'=>'Lorem ipsum dolor sit amet, mauris elit libero, lacus volutpat, eu consectetuer justo eu pellentesque. Impedit vestibulum donec, vivamus mi, ut pellentesque porta justo enim eu, in porttitor massa enim inceptos non sed. Ultricies velit. In ut, rhoncus mi facilisis, tellus diam consectetuer mi vestibulum ipsum platea, nec quis elit et id sem vero.',
            'price'=>'1000',
        ]);
        $product->save();
        $product = new Product([
            'imagePath'=>'https://pbs.twimg.com/media/Cuc1Cc7VMAAb8OE.jpg:large',
            'title'=>'Product004',
            'description'=>'Lorem ipsum dolor sit amet, mauris elit libero, lacus volutpat, eu consectetuer justo eu pellentesque. Impedit vestibulum donec, vivamus mi, ut pellentesque porta justo enim eu, in porttitor massa enim inceptos non sed. Ultricies velit. In ut, rhoncus mi facilisis, tellus diam consectetuer mi vestibulum ipsum platea, nec quis elit et id sem vero.',
            'price'=>'1000',
        ]);
        $product->save();
        $product = new Product([
            'imagePath'=>'https://pbs.twimg.com/media/CuSN6FrWYAA5CY6.jpg:large',
            'title'=>'Product005',
            'description'=>'Lorem ipsum dolor sit amet, mauris elit libero, lacus volutpat, eu consectetuer justo eu pellentesque. Impedit vestibulum donec, vivamus mi, ut pellentesque porta justo enim eu, in porttitor massa enim inceptos non sed. Ultricies velit. In ut, rhoncus mi facilisis, tellus diam consectetuer mi vestibulum ipsum platea, nec quis elit et id sem vero.',
            'price'=>'1000',
        ]);
        $product->save();
    }
}
