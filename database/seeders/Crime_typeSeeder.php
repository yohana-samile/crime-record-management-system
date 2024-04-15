<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use DB;

    class Crime_typeSeeder extends Seeder {
        /**
         * Run the database seeds.
         */
        public function run(): void {
            DB::table('crime_types')->insert([
                ['name' => 'violent crime'],
                ['name' => 'property crime'],
                ['name' => ' white-collar crime'],
                ['name' => 'organized crime'],
                ['name' => 'consensual or victimless crime'],
            ]);
        }
    }
