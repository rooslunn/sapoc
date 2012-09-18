<?php

class Create_Users {
    
    /**
     * Make changes to the database.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table) {
            $table->engine = 'InnoDB';
//            $table->charset('utf8');
            
            $table->increments('id');
            $table->string('email', 64)->unique(); // unique index for faster search
            $table->string('password', 64);

            $table->string('company', 64)->nullable();
            $table->string('company_id', 32)->nullable();
            $table->string('country_id', 64)->nullable();
            $table->string('district_id', 64)->nullable();
            $table->string('city', 64)->nullable();
            $table->string('address', 128)->nullable();
            $table->string('phone_1', 32)->nullable();
            $table->string('phone_2', 32)->nullable();
            $table->string('contact_person', 64)->nullable();
            
            $table->string('code');
            $table->timestamps();
        });
        

        DB::table('users')->insert(array(
            'email'     => 'rkladko@gmail.com',
            'password'  => Hash::make('123456'),
        ));

    }
    
    /**
     * Revert the changes to the database.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}