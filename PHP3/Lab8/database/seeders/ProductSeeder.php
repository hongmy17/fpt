<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'title' => 'Cà phê Arabica 250g',
                'description' => 'Cà phê Arabica tinh khiết được trồng và chăm sóc tận tâm trên những thửa đất phủ đầy cỏ xanh tươi mát, nằm ẩn mình trong vùng nông thôn hữu cơ của chúng tôi. Những hạt cà phê Arabica này được lựa chọn tỉ mỉ, đảm bảo chất lượng và hương vị tốt nhất. Chúng tôi tự hào giới thiệu một cốc cà phê độc đáo, thăng hoa vị ngon với hương thơm nồng nàn và vị đắng đặc trưng của Arabica. Sự tinh khiết của sản phẩm là kết quả của quy trình chế biến cẩn thận và đội ngũ nông dân tận tâm của chúng tôi. Đây không chỉ là một cốc cà phê, mà còn là một hành trình khám phá vị ngon và tận hưởng sự thư giãn trong từng ngụm. Hãy đắm chìm trong thế giới hương vị độc đáo và hãy để cà phê Arabica tinh khiết từ chúng tôi đồng hành cùng bạn mỗi sáng. Một kỳ nghỉ đẳng cấp và trải nghiệm cà phê không giống ai đang chờ bạn.',
                'price' => 250000,
                'thumbnail' => 'arabica.png',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Máy pha cà phê đơn giản',
                'description' => 'Máy pha cà phê cho người yêu cà phê tại nhà Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus omnis nesciunt adipisci vel voluptatem libero laborum, modi aperiam et corporis earum perspiciatis officiis placeat itaque. Fuga amet repellat itaque eaque!',
                'price' => 1000000,
                'thumbnail' => 'coffee-maker.png',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bộ ấm đun nước và pha cà phê',
                'description' => 'Bộ sản phẩm đa năng cho cà phê sáng tạo Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus omnis nesciunt adipisci vel voluptatem libero laborum, modi aperiam et corporis earum perspiciatis officiis placeat itaque. Fuga amet repellat itaque eaque!',
                'price' => 1500000,
                'thumbnail' => 'kettle-coffee.png',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cà Phê Rang Xay Nguyên Chất Flavor',
                'description' => 'Tây Nguyên Soul là đơn vị sản xuất & cung cấp cà phê chất lượng cao từ vùng đất Tây Nguyên. Mang đến trải nghiệm đáng giá về cà phê Việt Nam. Sản phẩm cà phê rang xay của Tây Nguyên Soul có nguồn gốc từ vùng trồng cà phê nổi tiếng chất lượng là Huyện CưM’Gar – Đăk Lăk và Cầu Đất – Lâm Đồng. Cà Phê Rang Xay Nguyên Chất Flavor là dòng cà phê rang 100% cà phê Arabica mức rang vừa (medium). Vị ít đắng, hương thơm như trái cây và mật ong hòa quyện, clean (trong, sạch), hậu dịu, ngọt nhẹ tự nhiên. ',
                'price' => 150000,
                'thumbnail' => 'milk-coffee.png',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Coc nhua giu nhiet',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur perspiciatis sed soluta natus rem dolorem temporibus quaerat, alias perferendis pariatur impedit similique. Laborum eligendi corporis minus beatae accusamus minima odit!',
                'price' => 10000,
                'thumbnail' => 'coffee-cup.png',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
