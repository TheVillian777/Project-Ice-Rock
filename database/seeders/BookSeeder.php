<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book')->insert([
            [
             'author_id' => '1',
             'category_id' => '1',
             'book_name' => 'The Wizard of Oz',
             'isbn' => '978150435',
             'book_price' => '6.95',
             'book_inventory' => '36',
             'book_description' => 'A stunningly beautiful hardback edition of the most famous journey in the world. Follow the yellow brick road! Dorothy thinks she is lost forever when a terrifying tornado crashes through Kansas and whisks her and her dog, Toto, far away to the magical land of Oz. To get home Dorothy must follow the yellow brick road to Emerald City and find the wonderfully mysterious Wizard of Oz. Together with her companions the Tin Woodman, the Scarecrow and the Cowardly Lion whom she meets on the way, Dorothy embarks on a strange and enchanting adventure.',
             'published_date' => '1993-02-01',
             'img_url' => 'Wizard_of_Oz_Cover.jpg'
            ],

            [
                'author_id' => '2',
                'category_id' => '2',
                'book_name' => 'Strange Case of Dr Jekyll and Mr Hyde',
                'isbn' => '97814123',
                'book_price' => '16.95',
                'book_inventory' => '34',
                'book_description' => 'One of Stevensons most famous and enduringly popular works, the Strange Case of Dr Jekyll and Mr Hyde describes the mysterious relationship between a respectable and affable doctor and his brutal associate. Set in the grimy streets of Victorian London, this tale of murder, split personality and obscure science, with its chilling revelation, became an instant horror classic when it was first published in 1886, and has enthralled and terrified generations of readers ever since. This volume also contains seven other Gothic stories by Stevenson such as The Body Snatchers, Markheim and Olalla - showcasing the authors mastery of the horror genre and his interest in both the otherworldly and the strange ways the human brain can distort reality.',
                'published_date' => '1993-02-01',
                'img_url' => 'Dr_JK_Cover.jpg'
            ],

            [
                'author_id' => '3',
                'category_id' => '3',
                'book_name' => 'The Secret of Chimneys',
                'isbn' => '9781223',
                'book_price' => '9.99',
                'book_inventory' => '24',
                'book_description' => 'A young drifter finds more than he bargained for when he agrees to deliver a parcel to an English country house… Little did Anthony Cade suspect that a simple errand on behalf of a friend would make him the centrepiece of a murderous international conspiracy. Someone would stop at nothing to prevent the monarchy being restored in faraway Herzoslovakia.  The combined forces of Scotland Yard and the French Surete can do no better than go in circles – until the final murder at Chimneys, the great country estate that yields up an amazing secret…',
                'published_date' => '1993-02-01',
                'img_url' => 'Secret_of_Chimneys_Cover.jpg'
            ],

            [
                'author_id' => '4',
                'category_id' => '4',
                'book_name' => 'Sherlock Holmes',
                'isbn' => '97814123',
                'book_price' => '16.95',
                'book_inventory' => '12',
                'book_description' => 'AN INTRODUCTION OF P.D. JAMES. This book contains all the investigations and adventures of the worlds most popular detective, Sherlock Holmes. From The Adventure of the Gloria Scott to His Last Bow we follow the illustrious career of this quintessential British hero from his university days to his final case. His efforts to uncover the truth take him all over the world and into conflict with all manner of devious criminals and dangerous villains, but thankfully his legendary powers of deduction, and his faithful companion Dr Watson, are more than up to the challenge.',
                'published_date' => '1993-02-01',
                'img_url' => 'Sherlock_Holmes_Cover.jpg'
            ],

            [
                'author_id' => '5',
                'category_id' => '5',
                'book_name' => 'Unleashed',
                'isbn' => '9780008',
                'book_price' => '16.95',
                'book_inventory' => '28',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Unleashed_Cover.jpg'
            ],

            [
                'author_id' => '6',
                'category_id' => '1',
                'book_name' => 'Harry Potter and the Sorcerer’s Stone',
                'isbn' => '9788869183157',
                'book_price' => '16.95',
                'book_inventory' => '27',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Harry_Potter_Cover.jpg'
            ],

            [
                'author_id' => '7',
                'category_id' => '2',
                'book_name' => 'IT',
                'isbn' => '9783453435773',
                'book_price' => '10.00',
                'book_inventory' => '7',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'IT_Cover.jpg'
            ],

            [
                'author_id' => '3',
                'category_id' => '3',
                'book_name' => 'The Mysterious Affair at Styles',
                'isbn' => '9781950347018',
                'book_price' => '10.00',
                'book_inventory' => '0',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Mysterious_Affair_At_Styles_Cover.jpg'
            ],

            [
                'author_id' => '3',
                'category_id' => '4',
                'book_name' => 'And Then There Were None',
                'isbn' => '9780008123208',
                'book_price' => '15.00',
                'book_inventory' => '29',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'And_Then_There_Were_None_Cover.jpg'
            ],

            [
                'author_id' => '8',
                'category_id' => '5',
                'book_name' => 'A Promised Land',
                'isbn' => '9781524763169',
                'book_price' => '18.00',
                'book_inventory' => '26',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'A_Promised_Land_Cover.jpg'
            ],

            [
                'author_id' => '9',
                'category_id' => '1',
                'book_name' => 'The Hobbit, or There and Back Again',
                'isbn' => '9780345445605',
                'book_price' => '11.00',
                'book_inventory' => '26',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'The_Hobbit_Cover.jpg'
            ],
            
            [
                'author_id' => '7',
                'category_id' => '2',
                'book_name' => 'Carrie',
                'isbn' => '9781444720693',
                'book_price' => '8.00',
                'book_inventory' => '9',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Carrie_Cover.jpg'
            ],

            [
                'author_id' => '10',
                'category_id' => '3',
                'book_name' => 'The Girl on the Train',
                'isbn' => ' 9780735219755',
                'book_price' => '10.00',
                'book_inventory' => '7',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Girl_On_The_Train_Cover.jpg'
            ],

            [
                'author_id' => '11',
                'category_id' => '4',
                'book_name' => 'To Die For',
                'isbn' => '9781538757901',
                'book_price' => '15.00',
                'book_inventory' => '21',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'To_Die_For_Cover.jpg'
            ],

            [
                'author_id' => '12',
                'category_id' => '5',
                'book_name' => 'Steve Jobs',
                'isbn' => '9781451648539',
                'book_price' => '17.00',
                'book_inventory' => '52',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Steve_Jobs_Cover.jpg'
            ],

            [
                'author_id' => '13',
                'category_id' => '1',
                'book_name' => 'A Game of Thrones',
                'isbn' => '9780553103540',
                'book_price' => '13.00',
                'book_inventory' => '12',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Game_Of_Thrones_Cover.jpg'
            ],

            [
                'author_id' => '14',
                'category_id' => '2',
                'book_name' => 'Dracula',
                'isbn' => '9781503261389',
                'book_price' => '9.00',
                'book_inventory' => '34',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Dracula_Cover.jpg'
            ],

            [
                'author_id' => '15',
                'category_id' => '3',
                'book_name' => 'The da Vinci Code',
                'isbn' => '9780307474278',
                'book_price' => '10.00',
                'book_inventory' => '23',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Da_Vinci_Code_Cover.jpg'
            ],

            [
                'author_id' => '16',
                'category_id' => '4',
                'book_name' => 'The Christmas Guest',
                'isbn' => '9780571378777',
                'book_price' => '7.00',
                'book_inventory' => '34',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'The_Christmas_Guest_Cover.jpg'
            ],

            [
                'author_id' => '17',
                'category_id' => '5',
                'book_name' => 'Einstein: His Life and Universe',
                'isbn' => '9781847390547',
                'book_price' => '13.00',
                'book_inventory' => '16',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Einstein_Cover.jpg'
            ],

            [
                'author_id' => '13',
                'category_id' => '1',
                'book_name' => 'A Clash of Kings',
                'isbn' => '9780553579901',
                'book_price' => '16.00',
                'book_inventory' => '12',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Clash_Of_Kings_Cover.jpg'
            ],

            [
                'author_id' => '7',
                'category_id' => '2',
                'book_name' => 'Misery',
                'isbn' => '9781473662070',
                'book_price' => '12.00',
                'book_inventory' => '23',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Misery_Cover.jpg'
            ],

            [
                'author_id' => '18',
                'category_id' => '3',
                'book_name' => 'A Flicker in the Dark',
                'isbn' => '9780008454487',
                'book_price' => '16.00',
                'book_inventory' => '35',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Flicker_In_The_Dark_Cover.jpg'
            ],

            [
                'author_id' => '19',
                'category_id' => '4',
                'book_name' => 'Local Woman Missing',
                'isbn' => '9780778389446',
                'book_price' => '20.00',
                'book_inventory' => '30',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Local_Woman_Missing_Cover.jpg'
            ],

            [
                'author_id' => '20',
                'category_id' => '5',
                'book_name' => 'Sonny Boy: A Memoir',
                'isbn' => '9781529912623',
                'book_price' => '18.00',
                'book_inventory' => '10',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993-02-01',
                'img_url' => 'Sonny_Boy_Cover.jpg'
            ],
       
        ]);
    }
}
//Image and Description Sources: Waterstones [online]. Available at: https://www.waterstones.com/books/bestsellers 