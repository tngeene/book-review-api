<?php 

    use App\Post;
    use Illuminate\Database\Seeder;

    class PostTableSeeder extends Seeder
    {
        public function run()
        {
            $post = new Post;
            $post->user_id = 1;
            $post->title = "Using Laravel Seeders";
            $post->body = "Laravel includes a simple method of seeding your database with test data using seed classes. All seed classes are stored in the database/seeds directory. Seed classes may have any name you wish, but probably should follow some sensible convention, such as UsersTableSeeder, etc. By default, a DatabaseSeeder class is defined for you. From this class, you may use the  call method to run other seed classes, allowing you to control the seeding order.";
            $post->save();

            $post = new Post;
            $post->user_id = 1;
            $post->title = "Database: Migrations";
            $post->body = "Migrations are like version control for your database, allowing your team to easily modify and share the application's database schema. Migrations are typically paired with Laravel's schema builder to easily build your application's database schema. If you have ever had to tell a teammate to manually add a column to their local database schema, you've faced the problem that database migrations solve.";
            $post->save();
        }
    }