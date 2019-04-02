<?php

namespace Lifequest\app\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Lifequest\app\Model\Quest
 *
 * @property int $id
 * @property string $title
 * @property int $projectId
 * @property int $isCompleted
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @method static \Illuminate\Database\Eloquent\Builder|\Lifequest\app\Model\Quest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Lifequest\app\Model\Quest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Lifequest\app\Model\Quest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Lifequest\app\Model\Quest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Lifequest\app\Model\Quest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Lifequest\app\Model\Quest whereIsCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Lifequest\app\Model\Quest whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Lifequest\app\Model\Quest whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Lifequest\app\Model\Quest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Quest extends Model
{
    protected $fillable = ['title', 'project_id'];
}
