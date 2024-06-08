<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'uname' => 'sachin',
                'fname' => 'Sachin',
                'lname' => 'Liyanage',
                'email' => 'sachin@sms.com',
                'type' => 'SuperAdmin',
                'display' => 'USB Serial Device',
                'printer' => 'POS-80-Series',
                'password' => '$2y$10$dgN/zltbOu4PawPhT8teW.Kj8y27E4C/sDFN3Z97irN.LXFAezuzu',
                'remember_token' => Str::random(10),
            ],
            [
                'uname' => 'SuperAdmin',
                'fname' => 'SuperAdmin',
                'lname' => 'SuperAdmin',
                'email' => 'SuperAdmin@sms.com',
                'type' => 'SuperAdmin',
                'display' => 'USB Serial Device',
                'printer' => 'POS-80-Series',
                'password' => '$2y$10$AkzDR5JWWA18WicwbPtGquui/eAX4cNNzt.rottIw4j0YVpjg5mF.', //Super@dm!nPassw0rd
                'remember_token' => Str::random(10),
            ],
            [
                'uname' => 'Admin',
                'fname' => 'Admin',
                'lname' => 'Admin',
                'email' => 'Admin@sms.com',
                'type' => 'Admin',
                'display' => 'USB Serial Device',
                'printer' => 'POS-80-Series',
                'password' => '$2y$10$7wKpLnC.biMC0NCumjvvMedyiRrYJe.RaaTibwmcbFGUTOE9BMy0q', //@dm!nP@ssw0rd
                'remember_token' => Str::random(10),
            ],
            [
                'uname' => 'Manager',
                'fname' => 'Manager',
                'lname' => 'Manager',
                'email' => 'Manager@sms.com',
                'type' => 'Manager',
                'display' => 'USB Serial Device',
                'printer' => 'POS-80-Series',
                'password' => '$2y$10$5l1zDl7vw5a.fvPmUzjUreFwb4KD6j64UHBUITadqIvEqAoAYhbWm', //M@n@gerP@ssw0rd
                'remember_token' => Str::random(10),
            ],
            [
                'uname' => 'Supervisor',
                'fname' => 'Supervisor',
                'lname' => 'Supervisor',
                'email' => 'Supervisor@sms.com',
                'type' => 'Supervisor',
                'display' => 'USB Serial Device',
                'printer' => 'POS-80-Series',
                'password' => '$2y$10$WxNvAOLnTrEdvTqpucgsOe6P7lEv3BuyoztzhMEcleU0bF9nWF4CK', //Superv!s0rP@ssw0rd
                'remember_token' => Str::random(10),
            ],
            [
                'uname' => 'Pos',
                'fname' => 'Pos',
                'lname' => 'Pos',
                'email' => 'Pos@sms.com',
                'type' => 'Pos User',
                'display' => 'USB Serial Device',
                'printer' => 'POS-80-Series',
                'password' => '$2y$10$6YJvjgguwSEZscjUiX0LneQ49kXdF0z3jgualcIWs7bgTlh6CQeMe', //P0sP@ssw0rd
                'remember_token' => Str::random(10),
            ],
        ];

        User::insert($users);
    }
}
