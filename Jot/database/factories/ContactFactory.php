<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use App\User;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'user_id'  => factory(User::class)->create(),
        'name'     => $faker->name,
        'email'    => $faker->email,
        'birthday' => '1985-02-27',
        'company'  => $faker->company,
    ];
});
