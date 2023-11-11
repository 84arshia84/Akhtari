<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('adresses',function (Blueprint $table){

            $table->id();
            $table->double('Lat');
            $table->double('Long');
            $table->string('Postal_code');
            $table->string('Address');
            $table->string('State');
            $table->string('City');
            $table->string('district');
            $table->string('Plaque');
            $table->string('the_unit');
            $table->string('Recipients_name');
            $table->string('Recipients_last_name');
            $table->string('phone_number');
            $table->string('user_id');
            $table->timestamps();
        });

    }
//'Postal code',
//'Address',
//'State',
//'City',
//'district',
//'Plaque',
//'the unit ',
//'Recipients name',
//'Recipients last name',
//'phone number'
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
