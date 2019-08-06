<?php
Use App\User;
use App\Models\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::insert('INSERT INTO professions (title) VALUES (:title)', [
        //    'title' => 'Desarrollador back-end2',
        // ]);

        //DB::insert('INSERT INTO professions (title) VALUES ("analista")');


        // Profession::create([
        //     'title' => 'a1a11111aaaaaaaaaaaa',
        // ]);

        factory(Profession::class)->times(17)->create();

    
    //     DB::table('professions')->insert([
    //         'title' => 'programadw3',
    //     ]);
    //     DB::table('professions')->insert([
    //         'title' => 'diseñsdador',
    //     ]);
    }
}
