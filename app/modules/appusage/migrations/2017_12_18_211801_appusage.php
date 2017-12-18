<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class Appusage extends Migration
{
    public function up()
    {
        $capsule = new Capsule();
        $capsule::schema()->create('appusage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number', 255)->nullable();
            $table->string('event', 255)->nullable();
            $table->string('bundle_id', 255)->nullable();
            $table->string('app_version', 255)->nullable();
            $table->string('app_name', 255)->nullable();
            $table->string('app_path', 255)->nullable();
            $table->integer('last_time_epoch')->nullable();
            $table->string('last_time', 255)->nullable();
            $table->integer('number_times')->nullable();

            $table->index('app_name', 'appusage_app_name');
            $table->index('app_path', 'appusage_app_path');
            $table->index('app_version', 'appusage_app_version');
            $table->index('bundle_id', 'appusage_bundle_id');
            $table->index('event', 'appusage_event');
            $table->index('last_time', 'appusage_last_time');
            $table->index('last_time_epoch', 'appusage_last_time_epoch');
            $table->index('number_times', 'appusage_number_times');
            // $table->timestamps();
        });
    }

    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->dropIfExists('appusage');
    }
}