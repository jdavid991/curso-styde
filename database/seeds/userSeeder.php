<?php
use App\Models\Profession;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //$professions = DB::select('SELECT id FROM professions WHERE title = ? LIMIT 0,1',['analista']);
        //dd($professions[0]->id);

        //$professions = DB::table('professions')->select('id')->take(1)->get();
        //dd($professions->first()->id);

        //$profession = DB::table('professions')->select('id')->first();
        
        $professionId = Profession::where('title', 'analista')->value('id');
       
        // dd($professions);

       User::create([
            'name' => '111211111',
            'email' => 'as9911112111111111111ssxcc',
            'password' => bcrypt('laravel'),
            //'profession_id' => $professionId,
        ]);


        factory(User::class)->create([
            'profession_id' => $professionId
        ]);

        factory(User::class, 40)->create();

    }
}
