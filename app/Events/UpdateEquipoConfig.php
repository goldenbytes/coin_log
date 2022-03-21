<?php

namespace App\Events;

use App\Models\Equipo;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateEquipoConfig implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The user that created the server.
     *
     * @var \App\Models\Equipo
     */
    public $equipo;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Equipo $equipo)
    {
        $this->equipo = $equipo;
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'config';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->equipo->id_eq);
    }
}
