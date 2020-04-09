<?php

namespace App\Policies;

use App\Models\Replies;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RepliesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create comments.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Replies  $comment
     * @return mixed
     */
    public function update(User $user, Replies $replies)
    {
        return $user->id === $replies->send_id;
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Replies  $comment
     * @return mixed
     */
    public function delete(User $user, Replies $replies)
    {
        return $user->id === $replies->send_id;
    }

    /**
     * Determine whether the user can restore the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Replies  $replies
     * @return mixed
     */
    public function restore(User $user, Replies $replies)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Replies  $replies
     * @return mixed
     */
    public function forceDelete(User $user, Replies $replies)
    {
        return $user->id === $replies->send_id;
    }
}
