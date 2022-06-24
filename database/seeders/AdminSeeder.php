<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name'  => 'User',
            'nis' => '12007616',
            'rombel_id' => 1,
            'rayon_id' => 1,
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'role' => 'siswa',
            'avatar' => '/img/avatar/ah.png',
            'hash' => md5(bcrypt('user@user.com'))
        ];
        User::create($user);

        $admin = [
            ['name'  => 'Richal Zacky', 'email' => 'richalwikrama@admin.com', 'password' => bcrypt('oktober'), 'role' => 'admin', 'avatar' => '/img/avatar/r.png', 'hash' => md5(bcrypt('richalwikrama@admin.com'))],
            ['name'  => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('password'), 'role' => 'admin', 'avatar' => '/img/avatar/images.png', 'hash' => md5(bcrypt('admin@admin.com'))],
            ['name'  => 'Admin', 'email' => 'mada@admin.com', 'password' => bcrypt('pembodohan'), 'role' => 'admin', 'avatar' => '/img/avatar/images.png', 'hash' => md5(bcrypt('mada@admin.com'))]
        ];

        User::insert($admin);
    }
}
