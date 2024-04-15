<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use DB;
    use App\Models\User;
    use App\Models\Reporter;
    use Auth;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\JsonResponse;

    class UserController extends Controller {
        public function user(){
            $users = DB::select("SELECT * FROM users, polices, reporters, roles, user_role WHERE reporters.user_id = users.id AND polices.user_id = users.id AND user_role.role_id = roles.id AND user_role.user_id = users.id ");
            return view('user', compact('users'));
        }
    }

