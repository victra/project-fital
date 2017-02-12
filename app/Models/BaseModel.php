<?php

class BaseModel extends LaravelArdent\Ardent\Ardent {

	/*
	|--------------------------------------------------------------------------
	| Helper Hooks
	|--------------------------------------------------------------------------
	*/

	public function beforeCreate()
	{
		
	}

	/*
	|--------------------------------------------------------------------------
	| Helper Methods
	|--------------------------------------------------------------------------
	*/

	public function addAppends($attribute)
	{
		if(!is_array($attribute)) {
			$attribute = array($attribute);
		}
		$this->appends = array_merge($this->appends, $attribute);
	}

	public function removeAllAppends()
	{
		$this->appends = array();
	}

	/*
	|--------------------------------------------------------------------------
	| Helper Functions
	|--------------------------------------------------------------------------
	*/

}