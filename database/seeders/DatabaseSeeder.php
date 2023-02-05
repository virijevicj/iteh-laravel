<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genre::truncate();
        Author::truncate();
        User::truncate();
        Book::truncate();

        Genre::insert([
            ['name'=>'Drama'],
            ['name'=>'Fantasy'],
            ['name'=>'Romance'],
            ['name'=>'History'],
            ['name'=>'Tragic']
        ]);

        User::factory(3)->create();
        User::insert([
            'name'=>'virke',
            'email'=>'virke9@gmail.com',
            'password'=>bcrypt('virke.9')
        ]);

        Author::insert([
            [
                'first_name'=>'Agatha',
                'last_name'=>'Christie'
            ],
            [
                'first_name'=>'William',
                'last_name'=>'Shakespeare'
            ],
            [
                'first_name'=>'Joanne',
                'last_name'=>'Rowling'
            ]
        ]);

        Book::insert([
            [
               'title'=> 'Murder on the Orient Express',
               'ISBN'=> '2942-4212-2414-2415',
               'year_of_publication'=> 1950,
               'grade'=> 9,
               'author_id'=> 1,
               'genre_id'=> 1,
               'user_id'=> 4
            ],
            [
                'title'=> 'Partners in Crime',
                'ISBN'=> '4241-5212-2714-9915',
                'year_of_publication'=> 1962,
                'grade'=> 9.1,
                'author_id'=> 1,
                'genre_id'=> 1,
                'user_id'=> 4
             ],
             [
                'title'=> 'Death on the Nile',
                'ISBN'=> '5541-3312-2766-8715',
                'year_of_publication'=> 1967,
                'grade'=> 8,
                'author_id'=> 1,
                'genre_id'=> 2,
                'user_id'=> 4
             ],
             [
                'title'=> 'Hamlet',
                'ISBN'=> '4441-9922-1266-8766',
                'year_of_publication'=> 1597,
                'grade'=> 8.5,
                'author_id'=> 2,
                'genre_id'=> 5,
                'user_id'=> 4
             ],
             [
                'title'=> 'Richard III',
                'ISBN'=> '1111-9955-7766-8743',
                'year_of_publication'=> 1604,
                'grade'=> 8,
                'author_id'=> 2,
                'genre_id'=> 4,
                'user_id'=> 4
             ],
             [
                'title'=> 'Romeo and Juliet',
                'ISBN'=> '2215-8245-2756-1143',
                'year_of_publication'=> 1624,
                'grade'=> 9.2,
                'author_id'=> 2,
                'genre_id'=> 3,
                'user_id'=> 4
             ],
             [
                'title'=> 'Harry Potter and the Philosophers Stone',
                'ISBN'=> '4455-2315-7668-8213',
                'year_of_publication'=> 1987,
                'grade'=> 9.9,
                'author_id'=> 3,
                'genre_id'=> 2,
                'user_id'=> 4
             ],
             [
                'title'=> 'Harry Potter and the Deathly Hallows',
                'ISBN'=> '1255-2377-2368-3313',
                'year_of_publication'=> 2007,
                'grade'=> 8.9,
                'author_id'=> 3,
                'genre_id'=> 2,
                'user_id'=> 4
             ],

            ]);

        
    }
}
