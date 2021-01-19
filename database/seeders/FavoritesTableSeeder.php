<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Question;
// use App\Models\Answer;
use Illuminate\Support\Facades\DB;
class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->delete();
        $users = User::pluck('id')->all();
        $questions = Question::all();
        $numberOfUsers = count($users);
        foreach ($questions as $question) {
         for($i = 0; $i < rand(0, $numberOfUsers); $i++) {
             $user = $users[$i];
             $question->favorites()->attach($user);
         }

        }
    }
}
