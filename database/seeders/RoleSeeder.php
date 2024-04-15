<?php
    namespace Database\Seeders;
    use DB;

    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class RoleSeeder extends Seeder {
        /**
         * Run the database seeds.
         */
        public function run(): void {
            DB::table('roles')->insert([
                ['name' => 'is_admin'],
                ['name' => 'is_police_staff'],
                ['name' => 'is_crime_reporter']
            ]);
        }
    }

