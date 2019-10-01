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

class Changedashboardpoli implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $user;
    protected $nomorantrian;
    protected $jenisantrian;
    protected $sisa;
    protected $total;
    protected $countertpp;
    protected $userid;

    public function __construct(User $user,$nomorantrian,$jenisantrian,$sisa,$total, $countertpp,$userid)
    {

        $this->user = $user;
        $this->nomorantrian = $nomorantrian;
        $this->jenisantrian = $jenisantrian;
        $this->sisa = $sisa;
        $this->total = $total;
        $this->countertpp = $countertpp;
        $this->userid = $userid;

    }

    public function broadcastWith()
    {
        return array(
            'name'   => $this->user->name,
            'nomorantrian'   => $this->nomorantrian,
            'jenisantrian'   => $this->jenisantrian,
            'sisa'   => $this->sisa,
            'total'   => $this->total,
            'countertpp'   => $this->countertpp,
            'userid'   => $this->userid
        );
    }
    public function broadcastOn()
    {
        return new PrivateChannel('changedashboardpoli.' .  $this->userid);
    }
}
