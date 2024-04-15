<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Location extends Model {
        protected $fillable = ['region', 'regioncode', 'district', 'districtcode', 'ward', 'wardcode', 'street', 'places'];
    }

