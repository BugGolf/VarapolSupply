<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger("status")->default(1);
            $table->unsignedSmallInteger("is_admin")->default(0);
            $table->string("name");

            $table->string("email")->nullable();
            $table->string("phone")->nullable();

            $table->string("address_no")->nullable();
            $table->string('address_group')->nullable();
            $table->string('address_soi')->nullable();
            $table->string('address_district')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_province')->nullable();

            $table->string('username');
            $table->string('password');
            $table->timestamps();
            
        });

        DB::table('user')->insert([
            "name" => "Admin",
            "is_admin" => 1,
            "username" => "admin",
            "password" => Hash::make("123456")
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
