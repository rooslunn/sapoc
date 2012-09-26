<?php

class Create_Refs {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('refs', function ($table) {
		    $table->increments('ref_id');
		    $table->integer('ref_type')->index();
		    $table->integer('parent_ref_id')->default(0)->index();
		    $table->string('ref_name', 64)->index();
		    $table->string('ref_comparator', 8)->default('=');
		    $table->timestamps();
		});
		
		$this->_fill();
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('refs');
	}

    private function _fill() {
        foreach (Config::get('refs') as $ref => $data) {
            $ref_type = $data['ref_type'];
            $parent_ref_id = $data['parent_ref_id'];
            $values = explode(',', $data['values']);
            foreach ($values as $ref_name) {
            	$ref_name_parts = explode('|', $ref_name);
            	if (count($ref_name_parts) > 1)
            		$comparator = $ref_name_parts[1];
            	else
            		$comparator = '=';
                DB::table('refs')->insert(array(
                    'ref_type' 		 => $ref_type,
                    'parent_ref_id'	 => $parent_ref_id,
                    'ref_name' 		 => $ref_name_parts[0],
                    'ref_comparator' => $comparator
                ));
            }
        }
    }
}