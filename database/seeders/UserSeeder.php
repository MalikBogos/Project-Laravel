<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'test',
            'first_name' => 'Test',
            'last_name' => 'User',
            'birthday' => '1990-01-01',
            'avatar' => 'avatars/default_avatar.png',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida mollis felis, eu convallis nisi varius non. Nulla facilisi. Sed consequat suscipit tellus, non vestibulum metus cursus vel. Nullam luctus tristique eros. Integer non magna non eros lacinia dictum. Vivamus nec leo et mauris lobortis feugiat. Proin porttitor ex nec est rhoncus, a interdum nunc auctor. Vivamus et ex nec libero congue varius.',
            'email' => 'test@ehb.be',
            'password' => Hash::make('test12345'),
            'usertype' => 'user',
        ]);
        
        User::create([
            'name' => 'admin',
            'first_name' => 'Admin',
            'last_name' => 'User',
            'birthday' => '1985-05-10',
            'avatar' => 'avatars/default_avatar.png',
            'bio' => 'Sed gravida mollis felis, eu convallis nisi varius non. Nulla facilisi. Sed consequat suscipit tellus, non vestibulum metus cursus vel. Nullam luctus tristique eros. Integer non magna non eros lacinia dictum. Vivamus nec leo et mauris lobortis feugiat. Proin porttitor ex nec est rhoncus, a interdum nunc auctor. Vivamus et ex nec libero congue varius.',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'usertype' => 'admin',
        ]);
        
        User::create([
            'name' => 'jane_doe',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'birthday' => '1988-09-15',
            'avatar' => 'avatars/default_avatar.png',
            'bio' => 'Vivamus nec leo et mauris lobortis feugiat. Proin porttitor ex nec est rhoncus, a interdum nunc auctor. Vivamus et ex nec libero congue varius.',
            'email' => 'janedoe@ehb.be',
            'password' => Hash::make('password123'),
            'usertype' => 'user',
        ]);
        
        User::create([
            'name' => 'john_doe',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'birthday' => '1988-09-15',
            'avatar' => 'avatars/default_avatar.png',
            'bio' => 'Integer non magna non eros lacinia dictum. Vivamus nec leo et mauris lobortis feugiat. Proin porttitor ex nec est rhoncus, a interdum nunc auctor. Vivamus et ex nec libero congue varius.',
            'email' => 'johndoe@ehb.be',
            'password' => Hash::make('password456'),
            'usertype' => 'user',
        ]);
    }
}
