<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PoliceStation extends Model {
        use HasFactory;
        protected $fillable = [
            'caseReported', 'district'
        ];
        public function caseReported(){
            return $this->belongsTo(CaseReported::class);
        }
    }

