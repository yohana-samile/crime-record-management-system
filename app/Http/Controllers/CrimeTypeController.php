<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use DB;
    use App\Models\Crime_type;
    use App\Models\CaseReported;
    use App\Models\User;
    use App\Models\Region;
    use App\Models\Reporter;
    use Auth;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\JsonResponse;

    class CrimeTypeController extends Controller {
        public function index() {
            $crimes = Crime_type::get();
            return view('crimeTypes/index', compact('crimes'));
        }
        public function add_crime_type() {
            return view('crimeTypes/add_crime_type');
        }

        public function submit_crime_type(Request $request){
            $validateData = $request->validate([
                'name' => 'required',
            ]);
            $crimeType = Crime_type::create($validateData);
            if($crimeType){
                return response()->json('success');
            }
            else{
                return response()->json('error');
            }
        }

        public function report_new_crime(){
            $crimes = Crime_type::get();
            $regions = Region::get();
            return view('report_new_crime', [
                'crimes' => $crimes,
                'regions' => $regions
            ]);
        }

        public function fetchdistricts($regionId){
            try {
                $fetcheddistricts = DB::select("SELECT district FROM districts WHERE region = '$regionId'");
                return response()->json($fetcheddistricts);
            } catch (\Exception $e) {
                // Log the error
                \Log::error('Error fetching districts: ' . $e->getMessage());
                // Return an error response
                return response()->json(['error' => 'Failed to fetch districts.'], 500);
            }
        }
        // fetchwards
        public function fetchwards($districtId){
            $fetchedwards = DB::select("SELECT ward from wards where district = '$districtId' ");
            return response()->json($fetchedwards);
        }
        // fetchstreets
        public function fetchstreets($wardId){
            try {
                $fetchedstreets = DB::select("SELECT street from ward_streets_places where ward = '$wardId' ");
                return response()->json($fetchedstreets);
            } catch (\Exception $e) {
                // Log the error
                \Log::error('Error fetching streets: ' . $e->getMessage());
                // Return an error response
                return response()->json(['error' => 'Failed to fetch streets.'], 500);
            }
        }

        public function report_new_crime_action(Request $request){
            $validate = $request->validate([
                'crime_type_id' => 'required',
                'region' => 'required',
                'district' => 'required',
                'ward' => 'required',
            ]);
            $rb_number = rand(1000, 10000);
            $rb_number_generated = 'crms_'.$rb_number;
            $user = Auth::User()->id;
            $reporter = Reporter::find($user);
            $insert = CaseReported::create([
                'rb_number' => $rb_number_generated,
                'reporter_id' => $reporter->id,
                'crime_type_id' => $validate['crime_type_id'],
                'region' => $validate['region'],
                'district' => $validate['district'],
                'ward' => $validate['ward'],
                'case_discription' => $request->input('case_discription'),
            ]);
            if ($insert) {
                return response()->json('success');
            }
            else{
                return response()->json('error');
            }
        }

        // case_reported
        public function case_reported(){
            $case_reported = DB::select("SELECT case_reporteds.id, case_reporteds.rb_number, case_reporteds.region, case_reporteds.district, case_reporteds.ward, case_reporteds.case_status, case_reporteds.created_at, users.name as user_name, crime_types.name as crime_type_name FROM case_reporteds, users, reporters, crime_types WHERE case_reporteds.reporter_id = reporters.id AND reporters.user_id = users.id AND case_reporteds.crime_type_id = crime_types.id ");
            return view('case_reported', compact('case_reported'));
        }

        // update_case_status
        public function update_case_status($id){
            $case = CaseReported::find($id);
            return view('update_case_status', compact('case'));
        }

        // update_case_status_action
        public function update_case_status_action(Request $request){
            $validate = $request->validate([
                'id' => 'required',
                'case_status' => 'required',
            ]);
            $case = CaseReported::find($validate['id']);
            if (!$case) {
                return response()->json('error');
            }
            else{
                $case_status = $request->input('case_status');
                $id = $case->id;
                $update = DB::update("UPDATE case_reporteds SET case_status = ? WHERE id = ?", [$case_status, $id]);
                if ($update) {
                    return response()->json('success');
                }
                else{
                    return response()->json('error');
                }
            }
        }
    }

