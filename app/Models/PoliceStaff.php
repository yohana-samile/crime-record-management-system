<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PoliceStaff extends Model {
        use HasFactory;
        protected $table = 'police_staffs';
        protected $fillable = [
            'user_id', 'dob', 'gender', 'phone_number', 'address', 'rank_id', 'badge_number', 'region'
        ];
        public function user(){
            return $this->hasOne(User::class);
        }
        public function rank(){
            return $this->belongsTo(Rank::class);
        }
    }

