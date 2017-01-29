<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Eloquent::unguard();
        if(defined('STDERR')) fwrite(STDERR, print_r("\n--- Seeding ---\n", TRUE));

        if(App::environment('production')) {
            if(defined('STDERR')) fwrite(STDERR, print_r("--- ERROR: Seeding in Production is prohibited ---\n", TRUE));
            return;
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        if(defined('STDERR')) fwrite(STDERR, print_r("Set FOREIGN_KEY_CHECKS=0 --- DONE\n", TRUE));

        $this->call(UsersTableSeeder::class);
        $this->call(SiswaTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        if(defined('STDERR')) fwrite(STDERR, print_r("Set FOREIGN_KEY_CHECKS=1 --- DONE\n", TRUE));        
        
        \Cache::flush();

        if(defined('STDERR')) fwrite(STDERR, print_r("--- End Seeding ---\n\n", TRUE));
    }
}
