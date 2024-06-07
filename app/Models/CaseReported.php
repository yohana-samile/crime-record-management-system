<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class CaseReported extends Model {
        use HasFactory;
        protected $fillable = [
            'rb_number', 'reporter_id', 'crime_type_id', 'region', 'district', 'ward', 'case_discription'
        ];
        public function reporter(){
            return $this->belongsToMany(Reporter::class);
        }
        public function policeStation(){
            return $this->hasMany(PoliceStation::class);
        }
        public function crime_type(){
            return $this->belongsToMany(Crime_type::class);
        }
    }
