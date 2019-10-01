<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;
class CallDisplaypoli implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $user;
    protected $message;
    protected $jenisantrian;
    protected $unprocess;
    protected $getprocessed;
    public function __construct(User $user, $message,$jenisantrian,$unprocess,$getprocessed)
    {
        $this->user = $user;
        $this->message = $message;
        $this->jenisantrian = $jenisantrian;
        $this->unprocess = $unprocess;
        $this->getprocessed = $getprocessed;

    }

    public function broadcastWith()
    {
        return array(
            'name'      => $this->user->name,
            'message'   => $this->message,
            'jenisantrian'   => $this->jenisantrian,
            'unprocess'   => $this->unprocess,
            'getprocessed'   => $this->getprocessed,

        );
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('calldisplaypoli');
    }
}
