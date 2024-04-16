<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use DB;
    use App\Models\User;
    use App\Models\Reporter;
    use App\Models\PoliceStaff;
    use App\Models\Rank;
    use Auth;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Support\Facades\Hash;

    class UserController extends Controller {
        public function user(){
            $users = DB::select("SELECT users.name, users.created_at, users.email, police_staffs.badge_number, roles.name as role_name, ranks.name as rank_name FROM police_staffs, users, roles, ranks WHERE users.role_id = roles.id AND police_staffs.user_id = users.id AND police_staffs.rank_id = ranks.id");
            return view('user', compact('users'));
        }
        public function register_user(){
            $ranks = Rank::get();
            return view('register_user', compact('ranks'));
        }

        // register_police_staff
        public function register_police_staff(Request $request){
            $validateData = $request->validate([
                'name' => 'required',
                'dob' => 'required',
                'phone_number' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'rank_id' => 'required',
                'password' => 'required',
            ]);
            $badge_number = rand(3000, 30000);
            $bg_number = 'crms-'.$badge_number;

            $nameParts = explode(' ', $validateData['name']);
            $username = strtolower($nameParts[0]);
            $domain = '';
            if (count($nameParts) > 1) {
                $domain = strtolower(implode('', array_slice($nameParts, 1)));
            }
            $email_generated = $username . '@' . $domain . '.com';

            $user = User::create([
                'name' => $validateData['name'],
                'email' => $email_generated,
                'role_id' => 2,
                'password' => Hash::make($validateData['password']),
            ]);

            $register_police = new PoliceStaff();
            $register_police->phone_number = $validateData['phone_number'];
            $register_police->gender = $validateData['gender'];
            $register_police->dob = $validateData['dob'];
            $register_police->address = $validateData['address'];
            $register_police->rank_id = $validateData['rank_id'];
            $register_police->badge_number = $bg_number;

            $user->policeStaff()->save($register_police);
            // $user->roles()->attach(Role::where('name', 'is_police_staff')->first());
            if ($user && $register_police) {
                return response()->json("success");
            }
            else{
                return response()->json("error");
            }
        }

        // reporter
        public function reporter(){
            $reporters = User::whereHas('reporter')->get();
            return view('reporter', compact('reporters'));
        }
    }

