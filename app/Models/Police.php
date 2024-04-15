<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Police extends Model {
        use HasFactory;
        protected $fillable = [
            'user', 'dob', 'gender', 'phone_number'
        ];
        public function user(){
            return $this->hasOne(User::class);
        }
    }

