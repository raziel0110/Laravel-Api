<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Contact extends Model
{
    use Searchable;

    protected $fillable = ['name', 'email', 'birthday', 'company'];

    protected $dates = ['birthday'];

    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::parse($birthday)->format('Y-m-d');

    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/contacts/'.$this->id;
    }

    public function scopeBirthdays($query)
    {
        return $query->whereRaw('birthday like "%-'. now()->format('m') . '-%"');
    }
}
