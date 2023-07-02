<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Category;

class Candidate extends Model
{
    use HasFactory;

    protected $casts = [
        'dob' => 'date'
    ];


        /**
     * Get the user's phone number.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function phone(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->formatPhoneNumber($value),
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'program');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'email');
    }


    public function formatPhoneNumber($value)
    {
        $phone = ['70','71','76','78','79','81'];
        if(str_starts_with($value,'00961') == true)
        {
            return str_replace('00961','961',$value);
        }
        elseif(str_starts_with($value,'+961')==true)
        {
            return str_replace('+961','961',$value);
        }
        elseif(str_starts_with($value,'03')==true)
        {
            return str_replace('03','9613',$value);
        }
        elseif(str_starts_with($value,'+')==true)
        {
            return str_replace('+','',$value);
        }
        elseif(in_array(substr($value,0,2),$phone))
        {
            return '961'.$value;
        }
        else{
            return $value;
        }
    }
}
