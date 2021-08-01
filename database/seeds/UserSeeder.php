<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = User::where('email' , 'fiforeg@gmail.com')->first();
    	if(is_null($user)){
    		$user = new User();
	        $user->name = "Mohan Manirul";
	        $user->email = "fiforeg@gmail.com";
	        $user->password = Hash::make('463969463969');
	        $user->save();
    	}
        
    }
}
