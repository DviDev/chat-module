<?php

namespace Modules\Chat\Models\Modules\App\Models\Relations;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait BelongsToUser
{
    /**
     * @param User|Model|int $user
     * @return Builder
     */
    public static function byUserId(User|int $user): Builder
    {
        $user_id = $user->id ?? $user;
        return self::query()->where(['user_id' => $user_id]);
    }
}
