<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function deleteComment(User $user, Comment $comment)
{
    return $user->User_Type === 'Admin' || $user->User_ID === $comment->user_id;
}

}
