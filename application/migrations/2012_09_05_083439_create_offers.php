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
            
            $table->integer('auto_type');
            $table->float('auto_capacity');
            $table->integer('auto_load_type')->nullable();
            $table->float('auto_volume')->nullable();
            $table->float('auto_price')->nullable();
            $table->integer('auto_pay_type')->nullable();
            $table->integer('auto_count')->nullable();
            $table->string('auto_periodicity', 64)->nullable();
            $table->string('auto_license', 64)->nullable();
            
            $table->string('comments')->nullable();
            
            $table->string('contact_company', 64)->nullable();
            $table->string('contact_person', 64)->nullable();
            $table->string('contact_phone', 64)->nullable();
            $table->string('contact_phone2', 64)->nullable();
            $table->string('contact_email', 64)->nullable();
            
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