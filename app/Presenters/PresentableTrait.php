<?php

namespace App\Presenters;
use App\Presenters\Exceptions\PresenterException;

trait PresentableTrait {

	protected static $presenterInstance;

	public function present(){
		if(!$this->presenter || !class_exists($this->presenter)){
			throw new PresenterException('Please set the $protected property to your presenter path.');
		}

		if(!isset(static::$presenterInstance)){
			static::$presenterInstance = new $this->presenter($this);
		}


		return new $this->presenter($this);
	}
}