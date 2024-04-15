<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class WardStreetPlace extends Model {
        protected $fillable = ['ward', 'street', 'places', 'district'];
    }

