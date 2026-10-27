<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'biryani'  => 'Biryani & Rice',
            'starters' => 'Starters',
            'chicken'  => 'Chicken Main Course',
            'mutton'   => 'Mutton Main Course',
            'fish'     => 'Fish Main Course',
            'egg'      => 'Egg Main Course',
            'paneer'   => 'Paneer Main Course',
            'kebabs'   => "Kabab's",
            'rolls'    => 'Rolls',
            'breads'   => 'Breads',
            'desserts' => 'Desserts',
            'sides'    => 'Salad, Raita & Extras',
            'drinks'   => 'Drinks',
        ];

        $half  = 'Half';
        $h2    = 'Half (2 pcs)';
        $h4    = 'Half (4 pcs)';
        $h6    = 'Half (6 pcs)';
        $q3    = 'Qtr. (3 pcs)';
        $q6    = 'Qtr. (6 pcs)';
        $plate = '1 Plate (4 pcs)';
        $pc    = '1 Pcs';

        // [title, price, serving, description]
        $items = [
            'biryani' => [
                ['Wahid Chicken Biryani', '180', $h2, 'Fragrant basmati rice layered with marinated chicken and dum cooked with saffron and ghee.'],
                ['Wahid Mutton Biryani', '210', $h2, 'Basmati rice layered with tender mutton pieces, slow cooked on dum in the signature Wahid style.'],
                ['Wahid Paneer Biryani', '160', $half, 'Aromatic basmati rice layered with spiced paneer cubes, a flavourful vegetarian dum biryani.'],
                ['Wahid Egg Biryani', '140', $h2, 'Fragrant rice dum cooked with spiced masala and boiled eggs.'],
                ['Wahid Biryani Rice', '120', $half, 'Plain biryani-style rice cooked with whole spices and ghee, perfect with any gravy.'],
                ['Plain Rice', '100', $half, 'Steamed long-grain basmati rice, soft and fluffy.'],
                ['White Jeera Rice', '110', $half, 'Basmati rice tempered with cumin seeds and a touch of ghee.'],
            ],
            'starters' => [
                ['Chicken Fry', '240', $h4, 'Crisp, spiced fried chicken pieces marinated in house masala.'],
                ['Chicken Roasted', '240', $h4, 'Chicken marinated in spices and roasted until juicy with a smoky finish.'],
                ['Chicken Afghani', '240', $h4, 'Creamy, mildly spiced chicken marinated in cream and cashew paste, grilled to perfection.'],
                ['Chicken Lollipop', '240', $plate, 'Frenched chicken wings marinated in spices and fried crisp, served in lollipop style.'],
                ['Reshmi Chicken Tikka', '210', $h6, 'Silky chicken tikka marinated in cream, cheese and mild spices, grilled soft and juicy.'],
                ['Chicken Malai Tikka', '240', $h6, 'Tender chicken in a creamy malai marinade, grilled until melt-in-the-mouth.'],
                ['Chicken Green Tikka', '240', $h6, 'Chicken marinated in mint, coriander and green chilies, then grilled.'],
                ['Fish Finger', '240', $h6, 'Boneless fish strips coated and fried golden and crisp.'],
                ['Fish Fry', '240', $h6, 'Fish pieces marinated in spices and shallow fried until crisp outside and soft inside.'],
                ['Fish Tikka', '240', $h6, 'Fish chunks marinated in yogurt and spices and grilled to a smoky finish.'],
                ['Fish Green Tikka', '260', $h6, 'Fish marinated in a fresh mint and coriander paste, grilled tender.'],
                ['Paneer Tikka', '200', $h6, 'Paneer cubes marinated in spiced yogurt and grilled with a light char.'],
                ['Paneer Malai Tikka', '220', $h6, 'Soft paneer in a creamy malai marinade, mildly spiced and grilled.'],
                ['Paneer Green Tikka', '220', $h6, 'Paneer marinated in green herb paste and grilled until fragrant.'],
            ],
            'chicken' => [
                ['Chicken Korma', '170', $h2, 'Tender chicken slow-cooked in a mild, creamy gravy of yogurt, fried onions and aromatic whole spices.'],
                ['Chicken Masala', '200', $q3, 'Tender chicken cooked in a rich onion-tomato masala with freshly ground spices and finished with coriander.'],
                ['Chicken Curry', '200', $q3, 'Tender chicken simmered in a home-style spiced gravy, light on the palate and full of flavour.'],
                ['Chicken Butter', '230', $q3, 'Tender chicken tossed in a silky tomato-butter gravy with cream and a hint of kasuri methi.'],
                ['Chicken Kali Mirch', '230', $q3, 'Tender chicken cooked in a thick gravy bold with freshly crushed black pepper and warm spices.'],
                ['Chicken Changezi', '230', $q3, 'Tender chicken prepared in a robust, spicy Changezi-style gravy with a smoky, full-bodied finish.'],
                ['Boneless Chicken Masala', '240', $h4, 'Boneless chicken cooked in a rich onion-tomato masala with freshly ground spices and finished with coriander.'],
                ['Boneless Chicken Curry', '240', $h4, 'Boneless chicken simmered in a home-style spiced gravy, light on the palate and full of flavour.'],
                ['Boneless Chicken Butter', '270', $h4, 'Boneless chicken tossed in a silky tomato-butter gravy with cream and a hint of kasuri methi.'],
                ['Boneless Chicken Kali Mirch', '270', $h4, 'Boneless chicken cooked in a thick gravy bold with freshly crushed black pepper and warm spices.'],
                ['Boneless Chicken Changezi', '270', $h4, 'Boneless chicken prepared in a robust, spicy Changezi-style gravy with a smoky, full-bodied finish.'],
            ],
            'mutton' => [
                ['Mutton Korma', '210', $h2, 'Succulent mutton slow-cooked in a mild, creamy gravy of yogurt, fried onions and aromatic whole spices.'],
                ['Mutton Masala', '260', $q3, 'Succulent mutton cooked in a rich onion-tomato masala with freshly ground spices and finished with coriander.'],
                ['Mutton Curry', '260', $q3, 'Succulent mutton simmered in a home-style spiced gravy, light on the palate and full of flavour.'],
                ['Mutton Butter', '290', $q3, 'Succulent mutton tossed in a silky tomato-butter gravy with cream and a hint of kasuri methi.'],
                ['Mutton Kali Mirch', '290', $q3, 'Succulent mutton cooked in a thick gravy bold with freshly crushed black pepper and warm spices.'],
                ['Mutton Changezi', '290', $q3, 'Succulent mutton prepared in a robust, spicy Changezi-style gravy with a smoky, full-bodied finish.'],
                ['Mutton Kaleji', '190', $half, 'Goat liver tossed in onions, garlic and spices until tender and well-seasoned.'],
                ['Mutton Bheja Fry', '220', $half, 'Goat brain pan-fried with onions, green chilies and spices, a lucknowi delicacy.'],
            ],
            'fish' => [
                ['Fish Masala', '220', $q3, 'Fresh fish cooked in a rich onion-tomato masala with freshly ground spices and finished with coriander.'],
                ['Fish Curry', '220', $q3, 'Fresh fish simmered in a home-style spiced gravy, light on the palate and full of flavour.'],
                ['Fish Butter', '250', $q3, 'Fresh fish tossed in a silky tomato-butter gravy with cream and a hint of kasuri methi.'],
                ['Fish Kali Mirch', '250', $q3, 'Fresh fish cooked in a thick gravy bold with freshly crushed black pepper and warm spices.'],
                ['Fish Changezi', '250', $q3, 'Fresh fish prepared in a robust, spicy Changezi-style gravy with a smoky, full-bodied finish.'],
            ],
            'egg' => [
                ['Egg Masala', '160', $q3, 'Boiled eggs cooked in a rich onion-tomato masala with freshly ground spices and finished with coriander.'],
                ['Egg Curry', '160', $q3, 'Boiled eggs simmered in a home-style spiced gravy, light on the palate and full of flavour.'],
                ['Egg Butter', '180', $q3, 'Boiled eggs tossed in a silky tomato-butter gravy with cream and a hint of kasuri methi.'],
                ['Egg Kali Mirch', '180', $q3, 'Boiled eggs cooked in a thick gravy bold with freshly crushed black pepper and warm spices.'],
                ['Egg Changezi', '180', $q3, 'Boiled eggs prepared in a robust, spicy Changezi-style gravy with a smoky, full-bodied finish.'],
            ],
            'paneer' => [
                ['Paneer Masala', '200', $q6, 'Soft paneer cubes cooked in a rich onion-tomato masala with freshly ground spices and finished with coriander.'],
                ['Paneer Curry', '200', $q6, 'Soft paneer cubes simmered in a home-style spiced gravy, light on the palate and full of flavour.'],
                ['Paneer Butter', '230', $q6, 'Soft paneer cubes tossed in a silky tomato-butter gravy with cream and a hint of kasuri methi.'],
                ['Paneer Kali Mirch', '230', $q6, 'Soft paneer cubes cooked in a thick gravy bold with freshly crushed black pepper and warm spices.'],
                ['Paneer Changezi', '230', $q6, 'Soft paneer cubes prepared in a robust, spicy Changezi-style gravy with a smoky, full-bodied finish.'],
            ],
            'kebabs' => [
                ['Chicken Shami Kabab', '120', $plate, 'Soft patties of minced chicken and chana dal blended with spices and shallow fried.'],
                ['Chicken Boti Kabab', '170', $half, 'Marinated boneless chicken pieces grilled over charcoal until juicy.'],
                ['Mutton Shami Kabab', '150', $plate, 'Minced mutton and lentil patties with whole spices, pan fried till golden.'],
                ['Mutton Galavati Kabab', '190', $plate, 'The famed Lucknowi melt-in-mouth kabab of finely minced mutton with raw papaya and secret spices.'],
                ['Mutton Boti Kabab', '210', $half, 'Hand-cut mutton chunks marinated and roasted over charcoal, tender and lightly charred.'],
                ['Mutton Seekh Kabab', '160', $h2, 'Spiced minced mutton skewered and grilled, smoky and succulent.'],
                ['Veg. Kabab', '130', $plate, 'Pan-fried patties of mixed vegetables and spices, crisp outside and soft inside.'],
            ],
            'rolls' => [
                ['Chicken Shami Roll', '80', $pc, 'Chicken shami kabab wrapped in a soft paratha with onions and chutney.'],
                ['Chicken Boti Roll', '120', $pc, 'Juicy chicken boti pieces rolled with onions, mint chutney and sauces.'],
                ['Chicken Shawarma Roll', '100', $pc, 'Shredded spiced chicken rolled with garlic sauce and crunchy veggies.'],
                ['Chicken Shawarma Roll with Paratha', '120', $pc, 'Chicken shawarma filling wrapped in a flaky Mughlai paratha.'],
                ['Mutton Shami Roll', '100', $pc, 'Mutton shami kabab rolled in a soft paratha with onions and chutney.'],
                ['Mutton Galawati Roll', '120', $pc, 'Melt-in-mouth Galawati kabab wrapped in paratha with onions and mint chutney.'],
                ['Mutton Boti Roll', '130', $pc, 'Charcoal-grilled mutton boti rolled with onions and tangy chutney.'],
                ['Mutton Kaleji Roll', '130', $pc, 'Spiced goat liver wrapped in a warm paratha with onions and chutney.'],
                ['Paneer Roll', '110', $pc, 'Spiced paneer tikka rolled with onions, capsicum and mint chutney.'],
                ['Veg. Kabab Roll', '110', $pc, 'Crisp veg kabab wrapped in a soft paratha with fresh salad and chutney.'],
            ],
            'breads' => [
                ['Rumali Roti', '10', $pc, 'Paper-thin handkerchief bread cooked on an inverted tawa.'],
                ['Mughlai Paratha', '25', $pc, 'Flaky, layered flatbread cooked on a tawa with ghee.'],
                ['Sheermal', '25', $pc, 'Mildly sweet saffron-tinted flatbread, soft and rich.'],
                ['Kulcha', '25', $pc, 'Soft leavened bread baked golden, ideal with curries.'],
                ['Plain Naan', '25', $pc, 'Soft, fluffy tandoor-style naan.'],
                ['Butter Naan', '30', $pc, 'Fluffy naan brushed generously with butter.'],
            ],
            'desserts' => [
                ['Shahi Tukda', '90', $pc, 'Ghee-fried bread soaked in sugar syrup and topped with thick, creamy rabri and dry fruits.'],
                ['Zafrani Kheer', '60', '1 Cup', 'Creamy rice pudding slow cooked in milk, flavoured with saffron and cardamom.'],
                ['Gulab Jamun', '50', $pc, 'Soft khoya dumplings fried golden and soaked in warm sugar syrup.'],
            ],
            'sides' => [
                ['Salad', '15', '1 Plate', 'Fresh sliced onions, cucumber and lemon with green chutney.'],
                ['Raita', '15', '1 Cup', 'Chilled whisked yogurt with cucumber and light spices.'],
                ['Gravy', '50', '1 Qtr.', 'Extra rich house gravy, perfect with breads and rice.'],
                ['Chicken (Extra Pieces)', '60', 'Extra', 'Additional chicken pieces to add to your order.'],
                ['Mutton (Extra Pieces)', '80', 'Extra', 'Additional mutton pieces to add to your order.'],
            ],
            'drinks' => [
                ['Cold Drinks', 'MRP', 'Bottle / Can', 'Chilled soft drinks served at maximum retail price.'],
                ['Water Bottle', 'MRP', 'Bottle', 'Packaged drinking water served at maximum retail price.'],
            ],
        ];

        $order = 1;
        foreach ($categories as $slug => $name) {
            $category = MenuCategory::updateOrCreate(
                ['slug' => $slug],
                ['name' => $name, 'sort_order' => $order++, 'status' => 1]
            );

            foreach ($items[$slug] as $i => [$title, $price, $serving, $description]) {
                MenuItem::updateOrCreate(
                    ['menu_category_id' => $category->id, 'title' => $title],
                    [
                        'price'       => $price,
                        'serving'     => $serving,
                        'description' => $description,
                        'sort_order'  => $i + 1,
                        'status'      => 1,
                    ]
                );
            }
        }
    }
}