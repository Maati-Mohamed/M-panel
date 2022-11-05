<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class AttachSuperAdminPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrFail();
        $structure = Config::get('laratrust_seeder.roles_structure')['superadmin'];
        $map = Config::get('laratrust_seeder.permissions_map');
        foreach ($structure as $key => $value) {
            $keys = explode(',',$value);
            foreach($keys as $perm){
               $this->command->info($key.'-'.$map[$perm]);
               $user->attachPermission($key.'-'.$map[$perm]);  
            }
            
        }
        $user->attachRole("superadmin");
    }
}
