<?php
    namespace Database\Seeders;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class UserRoleSeeder extends Seeder {
        /**
         * Run the database seeds.
         */
        public function run(): void {
             // Fetch user and role IDs from their respective tables
            $userId = DB::table('users')->where('email', 'yohanasamile@gmail.com')->value('id');
            $roleId = DB::table('roles')->where('name', 'is_admin')->value('id');

            // Insert the user_role relationship into the pivot table
            DB::table('user_role')->insert([
                'user_id' => $userId,
                'role_id' => $roleId,
            ]);
        }
    }
