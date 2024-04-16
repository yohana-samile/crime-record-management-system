<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Reporter extends Model {
        use HasFactory;
        protected $fillable = [
            'user_id', 'phone_number'
        ];
        public function caseReported(){
            return $this->hasMany(CaseReported::class);
        }
        public function user(){
            return $this->belongsTo(User::class);
        }
    }
