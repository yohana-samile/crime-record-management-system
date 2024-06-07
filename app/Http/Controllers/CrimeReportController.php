<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Crime_type;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\JsonResponse;
    use DB;
    use App\Models\User;
    use App\Models\Region;
    use App\Models\Reporter;
    use App\Models\CaseReported;
    use Illuminate\Support\Facades\Hash;

    class CrimeReportController extends Controller {
        public function crime_report(){
            $regions = Region::get();
            $crimes = Crime_type::get();
            return view('crime_report', [
                'regions' => $regions,
                'crimes' => $crimes
            ]);
        }

        public function  crime_report_action(Request $request){
            $validateData = $request->validate([
                'name' => 'required',
                'crime_type_id' => 'required',
                'phone_number' => 'required',
                'region' => 'required',
                'district' => 'required',
                'ward' => 'required',
                'case_discription' => 'nullable',
                'password' => 'required',
            ]);

            $rb = rand(3000, 30000);
            $rb_number = 'crms_'.$rb;

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
                'role_id' => 3,
                'password' => Hash::make($validateData['password']),
            ]);

            $reporter = new Reporter();
            $reporter->phone_number = $validateData['phone_number'];
            $user->reporter()->save($reporter);

            $report_case = new CaseReported();
            $report_case->crime_type_id = $validateData['crime_type_id'];
            $report_case->region = $validateData['region'];
            $report_case->district = $validateData['district'];
            $report_case->ward = $validateData['ward'];
            $report_case->case_discription = $validateData['case_discription'];
            $report_case->rb_number = $rb_number;

            $reporter->caseReported()->save($report_case);

            if ($user && $reporter && $report_case) {
                return response()->json("success");
            }
            else{
                return response()->json("error");
            }
        }
    }
