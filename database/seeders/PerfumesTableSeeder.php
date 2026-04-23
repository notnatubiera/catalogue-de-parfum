<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerfumesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('perfumes')->delete();
        
        \DB::table('perfumes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Baccarat Rouge 540',
                'brand_id' => 7,
                'description' => 'A sweet, airy blend of saffron, amber, and woods with a clean, glowing vibe. It smells luxurious and lasts all day.',
                'image' => 'fragrances/01KPXJ60YDBYVXXDYKEMK74F8A.jpg',
                'hero_image' => 'hero-images/01KPXJ60YFP6QCY68ZKF02GPB0.jpg',
                'is_featured' => 1,
                'time_of_day' => '["night"]',
                'longevity' => 'Very Long Lasting',
                'sillage' => 'Strong',
                'price' => '$$$$$',
                'gender' => 'Unisex',
                'created_at' => '2026-04-23 03:28:00',
                'updated_at' => '2026-04-23 17:23:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sauvage',
                'brand_id' => 2,
                'description' => 'Dior Sauvage is a radically fresh, "blue" fragrance defined by its strong presence and long-lasting performance. It opens with a sharp burst of Calabrian bergamot and spicy pepper, eventually settling into a raw, woody trail of amberwood and ambroxan. While famously marketed as a masculine scent fronted by Johnny Depp, its crisp, aromatic profile makes it popular for unisex wear. Highly versatile, it is suitable for all seasons and daily use, though its different concentrations—ranging from the fresh Eau de Toilette to the intense Elixir—allow it to transition seamlessly from the gym to formal evening events.',
                'image' => 'fragrances/Dior Sauvage Eau De Parfum 100Ml in None.jpg',
                'hero_image' => 'hero-images/f094-sauvage-eau-forte-24-p06e-pack-ingredient-l4-f39-66bcb885a1660.avif',
                'is_featured' => 0,
                'time_of_day' => '["night","day"]',
                'longevity' => 'Long Lasting',
                'sillage' => 'Strong',
                'price' => '$$$',
                'gender' => 'Masculine',
                'created_at' => '2026-04-23 14:12:07',
                'updated_at' => '2026-04-23 16:45:54',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Bleu de Chanel',
                'brand_id' => 3,
                'description' => 'Bleu de Chanel is a sophisticated and versatile "blue" fragrance renowned for its strong presence and long-lasting performance. It opens with a crisp, aromatic burst of citrus and pink pepper, which transitions into a deep, woody base of New Caledonian sandalwood and cedar. While traditionally marketed as a masculine scent, its elegant and clean profile makes it an excellent unisex choice. Ideally suited for all seasons and daily wear, it remains a staple for its ability to balance fresh, aquatic energy with a warm, masculine depth.',
                'image' => 'fragrances/I found the best men’s fragrances for Black Friday and I’m not gatekeeping.jpg',
                'hero_image' => 'hero-images/Gemini_Generated_Image_mqxmb0mqxmb0mqxm.png',
                'is_featured' => 0,
                'time_of_day' => '["night","day"]',
                'longevity' => 'Long Lasting',
                'sillage' => 'Moderate',
                'price' => '$$$$',
                'gender' => 'Masculine',
                'created_at' => '2026-04-23 16:36:13',
                'updated_at' => '2026-04-23 16:45:10',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Black Orchid',
                'brand_id' => 9,
                'description' => 'Black Orchid by Tom Ford is a luxurious and sensual fragrance characterized by its rich, dark accords. This unisex scent is known for its enormous sillage and very long-lasting performance, featuring an alluring potion of black orchid and spice. Its complex profile is built on earthy, floral, woody, sweet, and warm spicy accords, making it an ideal choice for winter nights and formal or date occasions.',
                'image' => 'fragrances/Tom Ford Black Orchid Eau de Parfum Fragrance _ Bloomingdale_s Beauty & Cosmetics.jpg',
                'hero_image' => 'hero-images/tom-ford-velvet-orchid-vs-black-orchid-whats-the-difference-192349.webp',
                'is_featured' => 0,
                'time_of_day' => '["night"]',
                'longevity' => 'Very Long Lasting',
                'sillage' => 'Enormous',
                'price' => '$$$$',
                'gender' => 'Unisex',
                'created_at' => '2026-04-23 16:44:30',
                'updated_at' => '2026-04-23 16:46:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'CK One',
                'brand_id' => 10,
                'description' => 'CK One by Calvin Klein is an iconic, shared fragrance designed for unisex wear. It features a clean, crisp, and refreshing profile characterized by citrus, fresh, green, aromatic, and musky accords. With moderate longevity and sillage, it is a versatile choice for daily use or sport during the spring and summer months.',
            'image' => 'fragrances/A popular, summer, citrus scent, a unisex fragrance (perfume for both men and women) from Calvin Klein - CK One.jpg',
                'hero_image' => 'hero-images/ckone-carousel-2.jpg',
                'is_featured' => 0,
                'time_of_day' => '["day"]',
                'longevity' => 'Moderate',
                'sillage' => 'Moderate',
                'price' => '$$',
                'gender' => 'Unisex',
                'created_at' => '2026-04-23 16:49:17',
                'updated_at' => '2026-04-23 16:49:33',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Aventus',
                'brand_id' => 11,
                'description' => 'Aventus by Creed is a sophisticated fragrance that celebrates strength, power, and success through a bold, fruity, and smoky profile. This masculine scent is long-lasting with a strong sillage, featuring a complex blend of fruity, smoky, woody, fresh, and musky accords. It is highly versatile, suitable for all seasons and daytime wear, making it a premier choice for the office, formal events, or dates.',
                'image' => 'fragrances/Creed Aventus Fragrance _ Nordstrom.jpg',
                'hero_image' => 'hero-images/c19930f1ae9c8b9591a96718a9df6278dbc93c29-2560x1228.jpg',
                'is_featured' => 0,
                'time_of_day' => '["day"]',
                'longevity' => 'Long Lasting',
                'sillage' => 'Strong',
                'price' => '$$$$$',
                'gender' => 'Masculine',
                'created_at' => '2026-04-23 16:51:06',
                'updated_at' => '2026-04-23 16:52:49',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'La Vie Est Belle',
                'brand_id' => 12,
                'description' => 'La Vie Est Belle by Lancôme is described as an "ode to joy, freedom, and beauty". This feminine fragrance is a sweet gourmand that features iris, patchouli, and praline. It is known for its eternal longevity and strong sillage. Its primary accords are sweet, vanilla, powdery, fruity, and floral, making it a perfect choice for winter or fall evenings. It is especially well-suited for formal occasions and dates.',
                'image' => 'fragrances/Lancome Paris.jpg',
                'hero_image' => 'hero-images/71nEwjeXi3L.webp',
                'is_featured' => 0,
                'time_of_day' => '["night"]',
                'longevity' => 'Very Long Lasting',
                'sillage' => 'Strong',
                'price' => '$$$',
                'gender' => 'Feminine',
                'created_at' => '2026-04-23 16:55:39',
                'updated_at' => '2026-04-23 16:56:14',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Good Girl',
                'brand_id' => 13,
                'description' => 'Good Girl by Carolina Herrera is a seductive feminine fragrance that explores a duality of light and dark. This very long-lasting scent features a strong sillage and is defined by its sweet, white floral, warm spicy, cacao, and vanilla accords. A captivating blend where tuberose and jasmine meet the richness of cocoa and tonka bean, it is an ideal choice for winter and fall nights, particularly for formal occasions or dates.',
                'image' => 'fragrances/Perfume Mujer Carolina Herrera Good Girl Edp 80 Ml___.jpg',
                'hero_image' => 'hero-images/carolina-herrera-good-girl-legere-review-2021-487305.webp',
                'is_featured' => 0,
                'time_of_day' => '["night"]',
                'longevity' => 'Very Long Lasting',
                'sillage' => 'Strong',
                'price' => '$$$',
                'gender' => 'Feminine',
                'created_at' => '2026-04-23 16:59:03',
                'updated_at' => '2026-04-23 17:02:20',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Santal 33',
                'brand_id' => 8,
                'description' => 'Santal 33 by Le Labo is an evocative, smoky fragrance designed to capture the essence of open landscapes. This unisex Eau de Parfum is long-lasting with a moderate sillage, making it a reliable choice for all seasons. Its composition features a sophisticated blend of woody, leather, smoky, musky, and warm spicy accords. Given its modern yet timeless appeal, it is perfectly suited for daytime wear, especially in daily or office settings.',
                'image' => 'fragrances/Le Labo Perfume Santal 33 Eau de Parfum, 100 ml Unisex - El Palacio de Hierro.jpg',
                'hero_image' => 'hero-images/gps_generated_b7f36145-dbe5-4894-b891-c88d80d258e6.webp',
                'is_featured' => 0,
                'time_of_day' => '["day"]',
                'longevity' => 'Long Lasting',
                'sillage' => 'Moderate',
                'price' => '$$$$$',
                'gender' => 'Unisex',
                'created_at' => '2026-04-23 17:04:03',
                'updated_at' => '2026-04-23 17:04:18',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Libre',
                'brand_id' => 1,
                'description' => 'Libre by Yves Saint Laurent is a bold feminine fragrance described as "the scent of freedom". This long-lasting Eau de Parfum features a strong sillage and is characterized by a vibrant blend of lavender, orange blossom, and musk. Its primary accords include white floral, vanilla, aromatic, citrus, and musky notes. Highly versatile, it is suitable for all seasons and transitions easily between day and night, making it an excellent choice for daily wear, dates, or formal events.',
                'image' => 'fragrances/Yves Saint Laurent Libre Eau de Parfum.jpg',
                'hero_image' => 'hero-images/yves-saint-laurent-yves-saint-laurent-libre-eau-de-parfum-50ml-gift-set-1196434928_1600x.webp',
                'is_featured' => 0,
                'time_of_day' => '["day","night"]',
                'longevity' => 'Long Lasting',
                'sillage' => 'Strong',
                'price' => '$$$',
                'gender' => 'Feminine',
                'created_at' => '2026-04-23 17:06:16',
                'updated_at' => '2026-04-23 17:06:52',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Eros',
                'brand_id' => 5,
                'description' => 'Eros by Versace is an intense and passionate masculine fragrance designed for seduction. This long-lasting Eau de Toilette features a strong sillage and is defined by its vanilla, fresh, sweet, woody, and aromatic accords. Combining notes of mint, vanilla, and tonka bean, it is an ideal choice for nighttime wear during the winter and fall, particularly for dates or formal occasions.',
                'image' => 'fragrances/Versace Eros by Gianni Versace 3_4 oz Eau de Toilette Spray – New in Box.jpg',
                'hero_image' => 'hero-images/photo-1659167664742-a592e00f5a29.avif',
                'is_featured' => 0,
                'time_of_day' => '["night"]',
                'longevity' => 'Long Lasting',
                'sillage' => 'Strong',
                'price' => '$$$',
                'gender' => 'Masculine',
                'created_at' => '2026-04-23 17:08:59',
                'updated_at' => '2026-04-23 17:13:11',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Alien',
                'brand_id' => 14,
                'description' => 'Alien by Mugler is a hypnotic and mysterious feminine fragrance known for its luminous and magnetic quality. It features an enormous sillage and eternal longevity, making it one of the most powerful scents in the collection. The composition is built on a blend of white floral, amber, woody, musky, and floral accords, specifically highlighting notes of jasmine, amber, and wood. Due to its intense nature, it is best suited for winter nights and formal or date occasions.',
                'image' => 'fragrances/Alien.jpg',
                'hero_image' => 'hero-images/mugler-pdp-tabs-description-desk.jpg',
                'is_featured' => 0,
                'time_of_day' => '["night"]',
                'longevity' => 'Very Long Lasting',
                'sillage' => 'Enormous',
                'price' => '$$$$',
                'gender' => 'Feminine',
                'created_at' => '2026-04-23 17:14:41',
                'updated_at' => '2026-04-23 17:15:11',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Wood Sage & Sea Salt',
                'brand_id' => 4,
                'description' => 'Wood Sage & Sea Salt by Jo Malone is a refreshing, mineral fragrance designed to evoke an escape to a windswept shore. This unisex cologne features a moderate longevity and an intimate sillage, making it a subtle and sophisticated choice. Its profile is defined by fresh, salty, marine, woody, and musky accords, capturing a free-spirited, earthy vibe. Ideally suited for daytime wear during the spring and summer, it is a versatile option for daily use, office environments, or sporty activities.',
                'image' => 'fragrances/Jo Malone London Wood Sage & Sea Salt Cologne - 100ml _ LOOKFANTASTIC.jpg',
                'hero_image' => 'hero-images/enhanced_images-p690251033713-4_075bdba7-f662-43a5-9960-9d024936ab02.webp',
                'is_featured' => 0,
                'time_of_day' => '["day"]',
                'longevity' => 'Moderate',
                'sillage' => 'Intimate',
                'price' => '$$$$',
                'gender' => 'Unisex',
                'created_at' => '2026-04-23 17:16:40',
                'updated_at' => '2026-04-23 17:18:10',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Molecule 01',
                'brand_id' => 15,
                'description' => 'Molecule 01 by Escentric Molecules is a minimalist and enigmatic unisex fragrance consisting of the single aroma-molecule Iso E Super. This Eau de Toilette is long-lasting with a moderate sillage, creating a scent profile that is uniquely yours once it reacts with the skin. It features woody, musky, amber, fresh, and powdery accords. Highly versatile and suitable for all seasons, it is an excellent choice for day or night and works perfectly in daily, office, or sport settings.',
                'image' => 'fragrances/Escentric Molecules Molecule 01 Eau de Toilette _ Dillard_s.jpg',
                'hero_image' => 'hero-images/20251016_GH_2824_EM_200ML_S_14_HERO_M01_0026_200ML_1920x1080_6c5a4764-7ea8-416a-bced-c81d8c921d66.webp',
                'is_featured' => 0,
                'time_of_day' => '["day"]',
                'longevity' => 'Long Lasting',
                'sillage' => 'Moderate',
                'price' => '$$$$',
                'gender' => 'Unisex',
                'created_at' => '2026-04-23 17:20:08',
                'updated_at' => '2026-04-23 17:20:27',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Gypsy Water',
                'brand_id' => 16,
                'description' => 'Gypsy Water by Byredo is a romanticized interpretation of the Romany lifestyle, offering a scent profile that is woody, smoky, and citrus-bright. This unisex Eau de Parfum features moderate longevity and sillage, making it a subtle yet distinct choice. Its composition is defined by citrus, woody, vanilla, fresh, and warm spicy accords. Ideally suited for daytime wear during the spring and summer, it is a versatile fragrance well-suited for daily use or office environments.',
            'image' => 'fragrances/download (9).jpg',
                'hero_image' => 'hero-images/byredo-gypsy-water-a-fragrance-for-every-season-994700.webp',
                'is_featured' => 0,
                'time_of_day' => '["day"]',
                'longevity' => 'Moderate',
                'sillage' => 'Moderate',
                'price' => '$$$$',
                'gender' => 'Unisex',
                'created_at' => '2026-04-23 17:22:27',
                'updated_at' => '2026-04-23 17:23:12',
            ),
        ));
        
        
    }
}