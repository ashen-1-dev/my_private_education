<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Parentt extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'user_id',
        'created_at',
        'updated_at'
    ];

    protected $rules = [
        'date_of_birth' => 'date_format:Y/m/d|before:today|after:1900-01-01',
        'phone_number' => 'regex:/^\+?7\d{10}$/',
    ];

    public function validate($params)
    {
        $validator = Validator::make($params, $this->rules);
        if ($validator->passes()) {
            return true;
        }
        $this->errors = $validator->messages();
        return false;
    }
}
