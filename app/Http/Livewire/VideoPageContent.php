<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Video;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VideoPageContent extends Component
{
    public $video = [];

    public function like()
    {
        $data = Like::firstOrCreate(
            ['user_id' => Auth::user()->id, 'video_id' => $this->video->id]
        );
        $data->isLiked = !$data->isLiked;
        $data->isDisliked = 0;
        $data->save();
    }

    public function dislike()
    {
        $data = Like::firstOrCreate(
            ['user_id' => Auth::user()->id, 'video_id' => $this->video->id]
        );
        $data->isLiked = 0;
        $data->isDisliked = !$data->isDisliked;
        $data->save();
    }

    public function mount($id)
    {
        $this->video = Video::findOrFail($id);
        $this->video->views = $this->video->views + 1;
        $this->video->save();
    }

    public function render()
    {
        return view('livewire.video-page-content');
    }
}
