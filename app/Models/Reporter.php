<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Reporter extends Model {
        use HasFactory;
        protected $fillable = [
            'user', 'phone_number'
        ];
        public function caseReported(){
            return $this->belongsToMany(CaseReported::class);
        }
        public function user(){
            return $this->hasOne(User::class);
        }
    }
