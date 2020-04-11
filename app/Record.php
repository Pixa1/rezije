<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //
    public $timestamps = false;
    //protected $hidden = ['id'];
    protected $dates = [
        'date',
    ];
    public function afterValidate() {
        if (count($this->errors()->toArray())==0 && !empty($this->password) && $this->password!=$this->getOriginal('password')) {
            $this->password = Hash::make($this->password);  // encrypting the password
            unset($this->password_confirmation);    // dropping password confirmation field
        }
    }
}
