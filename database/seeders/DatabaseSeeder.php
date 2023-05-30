<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Nguyễn Văn Cao',
                'email' => 'ncao515@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => '1.jpg',
                'level' => 1,
                'description' => 'Đập chai có gì sai',
                'company_name' => 'Đại học Sư phạm Kỹ thuật Hưng Yên',
                'country' => 'Việt Nam',
                'street_address' => 'Yên Khê, Việt Hòa, Khoái Châu, Hưng Yên',
                'postcode_zip' => '10000',
                'town_city' => 'Hưng Yên',
                'phone' => '0916710295',
            ],
            [
                'id' => 2,
                'name' => 'Hoàng Trung Hiếu',
                'email' => 'hth@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => '2.jpg',
                'level' => 2,
                'description' => 'Non choẹt',
                'company_name' => 'Đại học Sư phạm Kỹ thuật Hưng Yên',
                'country' => 'Việt Nam',
                'street_address' => 'Lôi Cầu, Việt Hòa, Khoái Châu, Hưng Yên',
                'postcode_zip' => '10000',
                'town_city' => 'Hưng Yên',
                'phone' => '0111111111',
            ],
            [
                'id' => 3,
                'name' => 'Nguyễn Quang Đạt',
                'email' => 'nqd@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => '3.jpg',
                'level' => 2,
                'description' => 'Chét, Chấn bé đù',
                'company_name' => 'Đại học Sư phạm Kỹ thuật Hưng Yên',
                'country' => 'Việt Nam',
                'street_address' => 'Tân Dân, Khoái Châu, Hưng Yên',
                'postcode_zip' => '10000',
                'town_city' => 'Hưng Yên',
                'phone' => '0222222222',
            ],
            [
                'id' => 4,
                'name' => 'Giang Gia Bảo',
                'email' => 'ggb515@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => '4.jpg',
                'level' => 2,
                'description' => 'Thích ăn sâm',
                'company_name' => 'Đại học Sư phạm Kỹ thuật Hưng Yên',
                'country' => 'Việt Nam',
                'street_address' => 'Bình Minh, Khoái Châu, Hưng Yên',
                'postcode_zip' => '10000',
                'town_city' => 'Hưng Yên',
                'phone' => '0333333333',
            ],
            [
                'id' => 5,
                'name' => 'Nguyễn Hương Giang',
                'email' => 'nhg@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => '5.jpg',
                'level' => 2,
                'description' => 'Yêu màu ồng ghét sự giả dối',
                'company_name' => 'Đại học Sư phạm Kỹ thuật Hưng Yên',
                'country' => 'Việt Nam',
                'street_address' => 'Toàn Thắng, Kim Động, Hưng Yên',
                'postcode_zip' => '10000',
                'town_city' => 'Hưng Yên',
                'phone' => '0444444444',
            ],
        ]);

        DB::table('blogs')->insert([
            [
                'user_id' => 3,
                'title' => 'The Personality Trait That Makes People Happier',
                'image' => 'blog-1.jpg',
                'category' => 'TRAVEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'This was one of our first days in Hawaii last week.',
                'image' => 'blog-2.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Last week I had my first work trip of the year to Sonoma Valley',
                'image' => 'blog-3.jpg',
                'category' => 'TRAVEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Happppppy New Year! I know I am a little late on this post',
                'image' => 'blog-4.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Absolue collection. The Lancome team has been one…',
                'image' => 'blog-5.jpg',
                'category' => 'MODEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Writing has always been kind of therapeutic for me',
                'image' => 'blog-6.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
        ]);

        DB::table('brands')->insert([
            [
                'name' => 'Calvin Klein',
            ],
            [
                'name' => 'Diesel',
            ],
            [
                'name' => 'Polo',
            ],
            [
                'name' => 'ELLY',
            ],
        ]);

        DB::table('product_categories')->insert([
            [
                'name' => 'Men',
            ],
            [
                'name' => 'Women',
            ],
            [
                'name' => 'Kids',
            ],
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'SWAT Pants',
                'description' => 'Men"s pants with slimfit pants will help comfortably in the buttocks and thighs and slightly hug the bottom will "hack" your legs to become endlessly long and will be convenient and flexible in movements . With a simple design combined with neutral colors, it will be the perfect choice for customers who prefer a minimalist fashion style. ',
                'content' => '',
                'price' => 19.99,
                'qty' => 20,
                'discount' => 15.00,
                'weight' => 1.3,
                'sku' => '00012',
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 2,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'KAKI Pants',
                'description' => 'Men"s pants with slimfit pants will help comfortably in the buttocks and thighs and slightly hug the bottom will "hack" your legs to become endlessly long and will be convenient and flexible in movements . With a simple design combined with neutral colors, it will be the perfect choice for customers who prefer a minimalist fashion style. ',
                'content' => '',
                'price' => 19.99,
                'qty' => 20,
                'discount' => 14.00,
                'weight' => 1.3,
                'sku' => '00013',
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 3,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'JOGGER JEAN Pants',
                'description' => 'Men"s pants with slimfit pants will help comfortably in the buttocks and thighs and slightly hug the bottom will "hack" your legs to become endlessly long and will be convenient and flexible in movements . With a simple design combined with neutral colors, it will be the perfect choice for customers who prefer a minimalist fashion style. ',
                'content' => '',
                'price' => 20.99,
                'qty' => 10,
                'discount' => 17.99,
                'weight' => 1.3,
                'sku' => '00014',
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 4,
                'brand_id' => 3,
                'product_category_id' => 1,
                'name' => 'POLO T-Shirt',
                'description' => 'Always the ideal outfit for hot summer days, now with new fabric CVC Crocodile will help preserve color , durable form, comfortable for the wearer. Therefore, the "Simplicity" shirt will be a Polo shirt that creates a simplicity but still exudes masculinity, which is clearly shown through the shape of the shirt combined with neutral colors suitable for guys. boy/gentleman wherever you go.',
                'content' => '',
                'price' => 15.99,
                'qty' => 10,
                'discount' => 10.99,
                'weight' => 1.3,
                'sku' => '00015',
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 5,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'WOMENS Sweater',
                'description' => 'Elevate your style with a new basic sweater for fashionistas. Designed with a harmonious background color palette, thick synthetic wool fabric and sweater style will help you effectively keep warm while still enhancing your fashion sense in the cold weather.',
                'content' => '',
                'price' => 12.00,
                'qty' => 20,
                'discount' => 10.00,
                'weight' => 1.3,
                'sku' => '00016',
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' =>6,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'WOMENS VEGETABLE Shirt',
                'description' => '"New breeze, new style", the velvet shirt that has just hit the shelves of TOTODAY will certainly not disappoint FRIENDs. The design has a cool cotton fabric with velvet as the highlight. Wearing a neutral color palette and basic designs ready to help you show off your sexy and personality in every photo shoot. ',
                'content' => '',
                'price' => 17.00,
                'qty' => 20,
                'discount' => 10.99,
                'weight' => 1.3,
                'sku' => '00017',
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' =>7,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'WOMENS T-Shirt',
                'description' => 'Womens T-shirts with vivid text motifs are applied modern flexible printing technology on a cool cotton background, suitable for girls who love personality and youthful style.',
                'content' => '',
                'price' => 15.00,
                'qty' => 30,
                'discount' => 12.99,
                'weight' => 1.3,
                'sku' => '00018',
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' =>8,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'BUCKET HAT',
                'description' => 'The hat has delicate hand-embroidered motifs with solid seams, soft velvet material combined with a vintage color palette. This accessory will definitely become a good assistant for all your outfits in the New Year.',
                'content' => '',
                'price' => 9.00,
                'qty' => 20,
                'discount' => 6.99,
                'weight' => 1.3,
                'sku' => '00019',
                'featured' => true,
                'tag' => 'Accessories',
            ],
            [
                'id' =>9,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Leather belts',
                'description' => 'Designed with synthetic leather and powerful black tone ready to help you conquer all the toughest outfits. ',
                'content' => '',
                'price' => 10.00,
                'qty' => 20,
                'discount' => 6.00,
                'weight' => 1.3,
                'sku' => '00020',
                'featured' => true,
                'tag' => 'Accessories',
            ],
            [
                'id' =>10,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Leather belts',
                'description' => 'Designed with synthetic leather and powerful black tone ready to help you conquer all the toughest outfits. ',
                'content' => '',
                'price' => 10.00,
                'qty' => 20,
                'discount' => 6.00,
                'weight' => 1.3,
                'sku' => '00021',
                'featured' => true,
                'tag' => 'Accessories',
            ],
            [
                'id' =>11,
                'brand_id' => 4,
                'product_category_id' => 2,
                'name' => 'Luxury book bag',
                'description' => '<p><strong>– Brand: </strong>ELLY.<br>
<strong>– Manufacture</strong>: China (according to ELLY brand quality standards).<br>
<strong>– Color: </strong>Blue<br>
–&nbsp;<strong>Dimensions</strong>: 18 x 18.5 x 8 cm (width x length x thickness).<br>
<strong>– Material</strong>: Imported high-grade synthetic leather with beautiful gloss, good waterproof, dustproof, durable over time. Each stitch is delicate, even on the surface of the leather to help increase the durability of the product.<br>
<strong>– Warranty:&nbsp;</strong>03 months (with manufacturing defects).</p>',
                'content' => '',
                'price' => 50.00,
                'qty' => 5,
                'discount' => 40.00,
                'weight' => 1.5,
                'sku' => '00022',
                'featured' => true,
                'tag' => 'HandBag',
            ],
            [
                'id' =>12,
                'brand_id' => 4,
                'product_category_id' => 2,
                'name' => 'Luxury book bag',
                'description' => '<p><strong>– Brand: </strong>ELLY.<br>
<strong>– Manufacture:</strong>&nbsp;China (according to ELLY brand quality standards).<br>
<strong>– Color:</strong> red, nude, black<br>
<strong>– Dimensions</strong>: 21 x 15 x 9 cm (Width x length x thickness).<br>
<strong>– Material:</strong>&nbsp;Premium synthetic leather.<br>
<strong>– Style:</strong>&nbsp;Crossbody bag.<br>
<strong>– Warranty:</strong>&nbsp;03 months (with manufacturing defects).</p>',
                'content' => '',
                'price' => 40.00,
                'qty' => 15,
                'discount' => 35.00,
                'weight' => 1.5,
                'sku' => '00023',
                'featured' => true,
                'tag' => 'HandBag',
            ],
            [
                'id' =>13,
                'brand_id' => 4,
                'product_category_id' => 2,
                'name' => 'ELLY GENUINE LEATHER WOMENS CLUTCH BAG',
                'description' => '<p><strong>– Brand: </strong>ELLY.<br>
<strong>– Manufacture</strong>: China (according to ELLY brand quality standards).<br>
<strong>– Color:</strong>&nbsp;Blue, black<br>
<strong>– Dimensions:&nbsp;</strong>28 x 15 x 4 cm (horizontal x vertical).<br>
<strong>– Material:&nbsp;</strong>High quality imported cowhide is soft, smooth, beautiful, waterproof, moldy, dustproof with natural crocodile skin and long lasting quality with time. .<br>
<strong>– Warranty:&nbsp;</strong>06 months (with manufacturing defects).</p>',
                'content' => '',
                'price' => 60.00,
                'qty' => 10,
                'discount' => 50.00,
                'weight' => 1.5,
                'sku' => '00024',
                'featured' => true,
                'tag' => 'HandBag',
            ],
            [
                'id' =>14,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'High-grade wax cowhide work bag',
                'description' => '<ul>
<li>Material: High quality cowhide imported from Italy</li>
<li>Size: 30cm x 40cm x 8cm</li>
<li>Pledge: Gento offers a full refund if the bag is not genuine leather and is not as pictured.</li>
</ul>',
                'content' => '',
                'price' => 100.00,
                'qty' => 5,
                'discount' => 80.00,
                'weight' => 2,
                'sku' => '00025',
                'featured' => true,
                'tag' => 'HandBag',
            ],
            [
                'id' =>15,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Cow Leather Mens Stomach Bag',
                'description' => '<ul>
<li>Material: 100% cowhide</li>
<li>Size: 13cm x 20cm x 5cm</li>
<li>Commitment: Gento offers a money-back guarantee if the product is not genuine leather and is not as pictured.</li>
</ul>',
                'content' => '',
                'price' => 100.00,
                'qty' => 5,
                'discount' => 80.00,
                'weight' => 2,
                'sku' => '00026',
                'featured' => true,
                'tag' => 'HandBag',
            ],
        ]);

        DB::table('product_images')->insert([
            //sp1
            [
                'product_id' => 1,
                'path' => 'men-1.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'men-1-1.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'men-1-2.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'men-1-3.jpg',
            ],
            [
                'product_id' => 1,
                'path' => 'men-1-4.jpg',
            ],
            //sp2
            [
                'product_id' => 2,
                'path' => 'men-2.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'men-2-1.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'men-2-2.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'men-2-3.jpg',
            ],
            [
                'product_id' => 2,
                'path' => 'men-2-4.jpg',
            ],
            //sp3
            [
                'product_id' => 3,
                'path' => 'men-3.jpg',
            ],
            [
                'product_id' => 3,
                'path' => 'men-3-1.jpg',
            ],
            [
                'product_id' => 3,
                'path' => 'men-3-2.jpg',
            ],
            [
                'product_id' => 3,
                'path' => 'men-3-3.jpg',
            ],
            //sp4
            [
                'product_id' => 4,
                'path' => 'men-4.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'men-4-1.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'men-4-2.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'men-4-3.jpg',
            ],
            [
                'product_id' => 4,
                'path' => 'men-4-4.jpg',
            ],
            //sp5
            [
                'product_id' => 5,
                'path' => 'women-1.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'women-1-1.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'women-1-2.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'women-1-3.jpg',
            ],
            [
                'product_id' => 5,
                'path' => 'women-1-4.jpg',
            ],
            //sp6
            [
                'product_id' => 6,
                'path' => 'women-2.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'women-2-1.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'women-2-2.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'women-2-3.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'women-2-4.jpg',
            ],
            [
                'product_id' => 6,
                'path' => 'women-2-5.jpg',
            ],
            //sp7
            [
                'product_id' => 7,
                'path' => 'women-3.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'women-3-1.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'women-3-2.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'women-3-3.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'women-3-4.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'women-3-5.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'women-3-6.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'women-3-7.jpg',
            ],
            [
                'product_id' => 7,
                'path' => 'women-3-8.jpg',
            ],
            //sp8
            [
                'product_id' => 8,
                'path' => 'women-4.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'women-4-1.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'women-4-2.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'women-4-3.jpg',
            ],
            [
                'product_id' => 8,
                'path' => 'women-4-4.jpg',
            ],
            //sp9
            [
                'product_id' => 9,
                'path' => 'men-9.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'men-9-1.jpg',
            ],
            [
                'product_id' => 9,
                'path' => 'men-9-2.jpg',
            ],
            //sp10
            [
                'product_id' => 10,
                'path' => 'men-10.jpg',
            ],
            [
                'product_id' => 10,
                'path' => 'men-10-1.jpg',
            ],
            [
                'product_id' => 10,
                'path' => 'men-10-2.jpg',
            ],
            //sp11
            [
                'product_id' => 11,
                'path' => 'women-11.jpg',
            ],
            [
                'product_id' => 11,
                'path' => 'women-11-1.jpg',
            ],
            [
                'product_id' => 11,
                'path' => 'women-11-2.jpg',
            ],
            [
                'product_id' => 11,
                'path' => 'women-11-3.jpg',
            ],
            [
                'product_id' => 11,
                'path' => 'women-11-4.jpg',
            ],
            //sp12
            [
                'product_id' => 12,
                'path' => 'women-12.jpg',
            ],
            //sp13
            [
                'product_id' => 13,
                'path' => 'women-13.jpg',
            ],
            //sp14
            [
                'product_id' => 14,
                'path' => 'men-14.jpg',
            ],
            //sp15
            [
                'product_id' => 15,
                'path' => 'men-15.jpg',
            ],
        ]);

        DB::table('product_details')->insert([
            //sp1
            [
                'product_id' => 1,
                'color' => 'Black',
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'Gray',
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'White',
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'color' => 'Beige',
                'size' => 'XS',
                'qty' => 5,
            ],
            //sp2
            [
                'product_id' => 2,
                'color' => 'Beige',
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'color' => 'Beige',
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'color' => 'Beige',
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'color' => 'Beige',
                'size' => 'XS',
                'qty' => 3,
            ],
            [
                'product_id' => 2,
                'color' => 'Beige',
                'size' => 'S',
                'qty' => 2,
            ],
            //sp3
            [
                'product_id' => 3,
                'color' => 'Black',
                'size' => 'XS',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'color' => 'Blue',
                'size' => 'M',
                'qty' => 5,
            ],
            //sp4
            [
                'product_id' => 4,
                'color' => 'Black',
                'size' => 'S',
                'qty' => 2,
            ],
            [
                'product_id' => 4,
                'color' => 'Gray',
                'size' => 'S',
                'qty' => 1,
            ],
            [
                'product_id' => 4,
                'color' => 'Gray',
                'size' => 'M',
                'qty' => 2,
            ],
            [
                'product_id' => 4,
                'color' => 'White',
                'size' => 'L',
                'qty' => 4,
            ],
            [
                'product_id' => 4,
                'color' => 'Gray',
                'size' => 'XS',
                'qty' => 1,
            ],
            //sp5
            [
                'product_id' => 5,
                'color' => 'Orange',
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 5,
                'color' => 'Orange',
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 5,
                'color' => 'Beige',
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 5,
                'color' => 'White',
                'size' => 'L',
                'qty' => 5,
            ],
            //sp6
            [
                'product_id' => 6,
                'color' => 'Brown',
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 6,
                'color' => 'Brown',
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 6,
                'color' => 'Green',
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 6,
                'color' => 'Green',
                'size' => 'L',
                'qty' => 5,
            ],
            //sp7
            [
                'product_id' => 7,
                'color' => 'White',
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'color' => 'White',
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'color' => 'Pink',
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'color' => 'Black',
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'color' => 'Turquoise',
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'color' => 'Orange',
                'size' => 'XL',
                'qty' => 5,
            ],
            //sp8
            [
                'product_id' => 8,
                'color' => 'Brown',
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 8,
                'color' => 'Black',
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 8,
                'color' => 'Cream',
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 8,
                'color' => 'Gray',
                'size' => 'L',
                'qty' => 5,
            ],
            //sp9
            [
                'product_id' => 9,
                'color' => 'Black',
                'size' => '',
                'qty' => 20,
            ],
            //sp10
            [
                'product_id' => 10,
                'color' => 'Black',
                'size' => '',
                'qty' => 20,
            ],
            //sp11
            [
                'product_id' => 11,
                'color' => 'Green',
                'size' => '',
                'qty' => 5,
            ],
            //sp12
            [
                'product_id' => 12,
                'color' => 'Black',
                'size' => '',
                'qty' => 5,
            ],
            [
                'product_id' => 12,
                'color' => 'Red',
                'size' => '',
                'qty' => 5,
            ],
            [
                'product_id' => 12,
                'color' => 'Pink',
                'size' => '',
                'qty' => 5,
            ],
            //sp13
            [
                'product_id' => 13,
                'color' => 'Black',
                'size' => '',
                'qty' => 5,
            ],
            [
                'product_id' => 13,
                'color' => 'Blue',
                'size' => '',
                'qty' => 5,
            ],
            //sp14
            [
                'product_id' => 14,
                'color' => 'Brown',
                'size' => '',
                'qty' => 5,
            ],
            //sp15
            [
                'product_id' => 15,
                'color' => 'Brown',
                'size' => '',
                'qty' => 5,
            ],
        ]);

        DB::table('product_comments')->insert([
            [
                'product_id' => 1,
                'user_id' => 4,
                'email' => 'BrandonKelley@gmail.com',
                'name' => 'Brandon Kelley',
                'messages' => 'Nice !',
                'rating' => 4,
            ],
            [
                'product_id' => 1,
                'user_id' => 5,
                'email' => 'RoyBanks@gmail.com',
                'name' => 'Roy Banks',
                'messages' => 'Nice !',
                'rating' => 4,
            ],
        ]);
    }
}

