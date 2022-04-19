<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class OtherVideos extends Component
{
    public $videoId;

    public function mount($videoId)
    {
        $this->videoId = $videoId;
    }

    public function render()
    {
        return view('livewire.other-videos', [
            'videos' => Video::all()->except($this->videoId)
        ]);
    }
}
