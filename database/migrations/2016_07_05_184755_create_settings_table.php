<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('setting',255);
            $table->string('value',255);
        });
        
        DB::table('settings')->insert(
            array(
                'setting' => 'Site Title',
                'value' => 'Your site title'
            ),
            array(
                'setting' => 'Github',
                'value' => 'http://github.com'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
