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
class AmbilAntrian implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    protected $nomorantrian;
    protected $jenisantrian;
    protected $sisa;
    protected $total;

    public function __construct($nomorantrian,$jenisantrian,$sisa,$total)
    {

        $this->nomorantrian = $nomorantrian;
        $this->jenisantrian = $jenisantrian;
        $this->sisa = $sisa;
        $this->total = $total;
    }

    public function broadcastWith()
    {
        return array(
            'nomorantrian'   => $this->nomorantrian,
            'jenisantrian'   => $this->jenisantrian,
            'sisa'   => $this->sisa,
            'total'   => $this->total,

        );
    }
    public function broadcastOn()
    {
        return new Channel('ambilantrian');
    }
}
