<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        $record = New \App\Models\User;
        $record->name = 'admin';
        $record->username = 'admin';
        $record->password = Hash::make('admin');
        $record->save();


        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_user');
    }
}
