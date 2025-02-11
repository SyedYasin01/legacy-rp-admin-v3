<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * A ban that can be issued by a player and received by a players.
 *
 * @package App
 *
 * @property string identifier
 * @property string reason
 * @property string ban-id
 */
class Ban extends Model
{

    /**
     * Column name for when the model was created.
     */
    const CREATED_AT = 'timestamp';

    /**
     * Column name for when the model was last updated.
     */
    const UPDATED_AT = 'timestamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_bans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ban-id', 'banner-id', 'identifier', 'reason',
    ];

    /**
     * Gets the reference id.
     *
     * @return mixed
     */
    protected function getRefIdAttribute()
    {
        return $this['ban-id'];
    }

    /**
     * Gets the player relationship.
     *
     * @return BelongsTo
     */
    public function player() : BelongsTo
    {
        return $this->belongsTo(Player::class, 'identifier', 'identifier');
    }

    /**
     * Gets the issuer relationship.
     *
     * @return BelongsTo
     */
    public function issuer() : BelongsTo
    {
        return $this->belongsTo(Player::class, 'banner-id', 'staff');
    }

}
