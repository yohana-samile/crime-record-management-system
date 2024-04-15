<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Crime_type extends Model {
        use HasFactory;
        protected $fillable = [
            'name'
        ];
        public function caseReported(){
            return $this->hasMany(CaseReported::class);
        }
    }

