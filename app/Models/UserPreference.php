<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserPreference
 *
 * @property int $id
 * @property int $user_id
 * @property int $preference_id
 * @property string $preference_type
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $Preference
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPreference newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPreference newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPreference query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPreference whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPreference whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPreference whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPreference wherePreferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPreference wherePreferenceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPreference whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPreference whereUserId($value)
 * @mixin \Eloquent
 */
class UserPreference extends Model
{
    public function Preference()
    {
        return $this->morphTo('Preference');
    }
}
