<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use DB;

    class Rankseeder extends Seeder {
        /**
         * Run the database seeds.
         */
        public function run(): void {
            DB::table('ranks')->insert([
                ['name' => 'officer'],
                ['name' => 'sergeant'],
                ['name' => 'lieutenant'],
                ['name' => 'captain'],
            ]);
        }
    }

