<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string("password");
            $table->boolean("permission")->default(1); //0: admin | 1: sima felhasználó
            $table->timestamps();
        });

        // rekordok ide kerülnek
        User::create(["name"=>"Könyvtár", "email"=>"admin@gmail.com", "password"=>Hash::make("St123456"),"permission"=>0]);
        User::create(["name"=>"Dóri", "email"=>"diak1@gmail.com", "password"=>Hash::make("Aa123456")]);
        User::create(["name"=>"Tomi", "email"=>"diak2@gmail.com", "password"=>Hash::make("Aa123456")]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
