<?php

$factory->defineAs(Hyn\MultiTenant\Models\Tenant::class, 'admin', function (Faker\Generator $faker) {
    return [
        'id' => 1,
        'name' => $faker->name,
        'email' => $faker->email,
        'administrator' => true,
    ];
});
