<?php

namespace App\Listeners;

use App\Events\PublishStatusEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Repositories\StatusesRepository;
use App\Status;
use Auth;

class PublishStatusListener
{
    protected $repo;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(StatusesRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle the event.
     *
     * @param  PublishStatusEvent  $event
     * @return void
     */
    public function handle(PublishStatusEvent $event)
    {
        $status = Status::publish($event->body);
        $this->repo->save($status, Auth::id());
    }
}
