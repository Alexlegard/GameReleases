<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
	 *
	 * Columns the games table should have:
	 * 
	 * game_id
	 * developer_id
	 * publisher_id
	 * title
	 * release_date
	 * 
	 * 
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('publisher_id');//Foreign key
			$table->string('title');
			$table->text('description');
			$table->date('release_date')->nullable();
			$table->string('boxart')->default("default_game_boxart.jpg");
            $table->timestamps();
			
			//Add indexes to foreign keys for performance purposes
			$table->index('publisher_id');
			
			//Many to many relationships with: Developer, genre, console

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
