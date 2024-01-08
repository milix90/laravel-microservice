<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /** @var Command */
    protected $command;

    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        try {
            User::query()->create([
                "uuid" => Str::uuid()->toString(),
                "name" => "Michael Jackson",
                "email" => "m.jackson@rip.io",
                "email_verified_at" => now(),
                "password" => Hash::make("password123"),
            ]);
        } catch (\Exception $e) {
            $errMsg = sprintf("USER INITIAL SEEDING FAILURE\n%s", $e->getMessage());
            $this->command->error($errMsg);
            die();
        }
    }
}
