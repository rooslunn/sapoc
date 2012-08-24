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
            $table->increments('id');
            $table->string('email', 64)->unique(); // unique index for faster search
            $table->string('password', 64);
/*             $table->string('activation_code', 64); */

            $table->string('company', 64);
            $table->string('company_id', 32);
            $table->integer('country_id');
            $table->integer('district_id');
            $table->string('city', 64);
            $table->string('address', 128);
            $table->string('phone_1', 32);
            $table->string('phone_2', 32);
            $table->string('contact_person', 64);
            
            $table->boolean('active');
            $table->timestamps();
        });
        
        DB::table('users')->insert(array(
            'email'     => 'ru@va.kl',
            'password'  => Hash::make('0'),
            'active'    => 1
        ));
/*
        define('NFIXTURES', 100);
        for ($i = 0; $i < NFIXTURES; $i++) {
            DB::table('users')->insert(array(
                'email'     => "user$i@sapoc.ua",
                'password'  => Hash::make('111111'),
                'active'    => 1
            ));
        }
*/
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