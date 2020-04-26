<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable($value = true);
            $table->string('sponsor_title')->default('true');
            $table->string('outstrem_logo')->default('true');
            $table->text('src');
            $table->text('imaUrl')->nullable($value = true);
            $table->text('logo')->nullable($value = true);
            $table->text('poster')->nullable($value = true);
            $table->text('width')->nullable($value = true);
            $table->text('height')->nullable($value = true);
            $table->string('color')->nullable($value = true);
            $table->string('islogoshow')->nullable($value = true);
            $table->string('isAudionOn')->nullable($value = true);
            $table->text('iframe_code')->nullable($value = true);
            $table->integer('decide_pre')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
