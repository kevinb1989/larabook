<?php
namespace App\Presenters;

class Status extends Presenter{
	public function created_at(){
		return $this->entity->created_at->diffForHumans();
	}
}