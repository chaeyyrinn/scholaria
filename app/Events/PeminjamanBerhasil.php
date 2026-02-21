<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class PeminjamanBerhasil implements ShouldBroadcast
{
    use SerializesModels;

    public $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function broadcastOn(): Channel
    {
        // public channel → semua petugas listen
        return new Channel('peminjaman');
    }

    public function broadcastAs(): string
    {
        return 'peminjaman.diajukan';
    }
}
