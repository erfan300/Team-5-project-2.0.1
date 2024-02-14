<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Http\Response;


class CommentController extends Controller
{
    public function store(Request $request, $product_id)
{
    $request->validate([
        'comment_text' => 'required',
    ]);


    $comment = new Comment([
        'comment_text' => $request->input('comment_text'),
        'user_id' => auth()->user()->User_ID,
        'product_id' => $product_id,
    ]);

    $comment->save();

    return redirect()->back();

}
    public function show($productId)
    {
        $comments = Comment::where('product_id', $productId)->whereNull('parent_id')->with('replies.user', 'replies.parent.user')->get();

        return view('product', compact('comments'));
    }

    public function reply(Request $request, $product_id, $comment_id)
{
    $request->validate([
        'reply_text' => 'required',
    ]);

    $user = auth()->user();

    $reply = new Comment([
        'comment_text' => $request->input('reply_text'),
        'user_id' => $user->User_ID,
        'product_id' => $product_id,
        'parent_id' => $comment_id,
    ]);

    $reply->save();

    return redirect()->back();
}

public function destroy($product_id, $comment_id)
{
    $comment = Comment::findOrFail($comment_id);

    // Check if the user is authorized to delete the comment
    if (auth()->user()->User_Type === 'Admin' || auth()->user()->User_ID === $comment->user_id) {
        // Delete the comment and its replies recursively
        $this->deleteCommentAndReplies($comment);

        return redirect()->back()->with('message', 'Comment deleted successfully.');
    }

    return response('Unauthorized', Response::HTTP_UNAUTHORIZED);
}
private function deleteCommentAndReplies($comment)
{
    foreach ($comment->replies as $reply) {
        $this->deleteCommentAndReplies($reply);
    }

    $comment->delete();
}
}