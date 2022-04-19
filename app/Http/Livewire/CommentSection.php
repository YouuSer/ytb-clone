<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommentSection extends Component
{
    public $video_id;
    public $content;
    public $user_id;

    public function mount($videoId, $userId)
    {
        $this->video_id = $videoId;
        $this->user_id = $userId;
    }

    public function saveComment()
    {
        $this->validate([
            'content' => "required",
        ]);
        Comment::create([
            'content' => $this->content,
            'user_id' => $this->user_id,
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
