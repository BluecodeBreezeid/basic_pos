<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email'    => 'admin@test.com',
            'password' => '$2y$10$wH8r6zK7K9J9z0F9z0v0F.9XQn7rVh8YJ7bX6YzYzYzYzYzYzYzYz', //123456
        ];

        // Simple Queries
        $this->db->query('INSERT INTO users (email, password) VALUES(:email:, :password:)', $data);
    }
}