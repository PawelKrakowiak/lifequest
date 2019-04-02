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
 * @property-read Collection|\Lifequest\app\Model\Quest[] $quests
 * @method static Builder|\Lifequest\app\Model\Project newModelQuery()
 * @method static Builder|\Lifequest\app\Model\Project newQuery()
 * @method static Builder|\Lifequest\app\Model\Project query()
 * @method static Builder|\Lifequest\app\Model\Project whereCreatedAt($value)
 * @method static Builder|\Lifequest\app\Model\Project whereDescription($value)
 * @method static Builder|\Lifequest\app\Model\Project whereId($value)
 * @method static Builder|\Lifequest\app\Model\Project whereIsCompleted($value)
 * @method static Builder|\Lifequest\app\Model\Project whereName($value)
 * @method static Builder|\Lifequest\app\Model\Project whereUpdatedAt($value)
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
