<?php

class Create_Offers {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('offers', function($table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('user_id')->nullable();
            
            $table->integer('offer_type');
            
            $table->date('from_date');
            $table->string('from_country', 64);
            $table->string('from_state', 64)->nullable();
            $table->string('from_town', 64);
            
            $table->date('to_date');
            $table->string('to_country', 64);
            $table->string('to_state', 64)->nullable();
            $table->string('to_town', 64);
            
            $table->string('auto_type', 64);
            $table->float('auto_capacity');
            $table->string('auto_load_type', 64)->nullable();
            $table->float('auto_volume')->nullable();
            $table->float('auto_price')->nullable();
            $table->integer('auto_count')->nullable();
            $table->string('auto_license', 64)->nullable();
            
            $table->string('comments')->nullable();
            
            $table->timestamps();
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('offers');
	}

}