<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommentSection extends Component
{
    public $video_id;
    public $content;

    public function mount($videoId)
    {
        $this->video_id = $videoId;
    }

    public function saveComment()
    {
        $this->validate([
            'content' => "required",
        ]);
        Comment::create([
            'content' => $this->content,
            'user_id' => Auth::user()->id,
            'video_id' => $this->video_id
        ]);

        $this->content = "";
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }

    public function render()
    {
        return view('livewire.comment-section', [
            'comments' => Comment::where('video_id', $this->video_id)->get()
        ]);
    }
}
