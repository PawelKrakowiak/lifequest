<?php

namespace Lifequest\app\Model;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property boolean $isCompleted
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property-read Collection|Quest[] $quests
 *
 * @method static Builder|Project newModelQuery()
 * @method static Builder|Project newQuery()
 * @method static Builder|Project query()
 * @method static Builder|Project whereCreatedAt($value)
 * @method static Builder|Project whereDescription($value)
 * @method static Builder|Project whereId($value)
 * @method static Builder|Project whereIsCompleted($value)
 * @method static Builder|Project whereName($value)
 * @method static Builder|Project whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class Project extends Model
{
    /** @var string */
    protected $table = 'projects';

    /** @var array */
    protected $fillable = ['name', 'description'];

    /** @return HasMany */
    public function quests()
    {
        return $this->hasMany(Quest::class);
    }
}
