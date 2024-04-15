<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use DB;
    use App\Models\Role;

    class RoleController extends Controller {
        public function index() {
            $roles = Role::get();
            return view('roles/index', compact('roles'));
        }
    }

