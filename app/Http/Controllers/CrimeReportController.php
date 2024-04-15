<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class CrimeReportController extends Controller {
        public function crime_report(){
            return view('crime_report');
        }
    }
