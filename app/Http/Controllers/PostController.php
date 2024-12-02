<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function likePost(Request $request, $postId)
    {
        $user = auth()->user(); // Get the authenticated user

        // Check if the user already liked the post
        $existingLike = Like::where('post_id', $postId)->where('user_id', $user->id)->first();

        if ($existingLike) {
            // If the user has already liked the post, remove the like (unlike)
            $existingLike->delete();
            return response()->json(['message' => 'Unliked', 'likes' => $this->getLikesCount($postId)]);
        } else {
            // Otherwise, add a new like
            Like::create([
                'post_id' => $postId,
                'user_id' => $user->id
            ]);
            return response()->json(['message' => 'Liked', 'likes' => $this->getLikesCount($postId)]);
        }
    }

// Method to get the number of likes for a post
    private function getLikesCount($postId)
    {
        return Like::where('post_id', $postId)->count();
    }

}
