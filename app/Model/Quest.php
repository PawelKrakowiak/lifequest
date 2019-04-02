<?php

namespace Lifequest\app\Model;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Lifequest\app\Model\Quest
 *
 * @property int $id
 * @property string $title
 * @property int $projectId
 * @property int $isCompleted
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 *
 * @method static Builder|Quest newModelQuery()
 * @method static Builder|Quest newQuery()
 * @method static Builder|Quest query()
 * @method static Builder|Quest whereCreatedAt($value)
 * @method static Builder|Quest whereId($value)
 * @method static Builder|Quest whereIsCompleted($value)
 * @method static Builder|Quest whereProjectId($value)
 * @method static Builder|Quest whereTitle($value)
 * @method static Builder|Quest whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class Quest extends Model
{
    /** @var string */
    protected $table = 'projects';

    protected $fillable = ['title', 'project_id'];
}
