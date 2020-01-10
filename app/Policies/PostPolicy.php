<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Post $post)
    {
        //
    }

    public function create(User $user)
    {
        return $user->hasAccess(['post.create']);
    }

    public function update(User $user, Post $post)
    {
        return $user->hasAccess(['post.update']) or $user->id == $post->user_id;
    }

    public function delete(User $user, Post $post)
    {
        //
    }

    public function publish(User $user)
    {
        return $user->hasAccess(['post.publish']);
    }

    public function draft(User $user)
    {
        return $user->inRole('editor');
    }
}
