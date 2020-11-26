<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\BlogCategory
 *
 * @property int $id
 * @property int $parent_id
 * @property string $slug
 * @property string $title
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static Builder|BlogCategory newModelQuery()
 * @method static Builder|BlogCategory newQuery()
 * @method static Builder|BlogCategory query()
 * @method static Builder|BlogCategory whereCreatedAt($value)
 * @method static Builder|BlogCategory whereDeletedAt($value)
 * @method static Builder|BlogCategory whereDescription($value)
 * @method static Builder|BlogCategory whereId($value)
 * @method static Builder|BlogCategory whereParentId($value)
 * @method static Builder|BlogCategory whereSlug($value)
 * @method static Builder|BlogCategory whereTitle($value)
 * @method static Builder|BlogCategory whereUpdatedAt($value)
 * @mixin Eloquent
 */
class BlogCategory extends Model
{
    use SoftDeletes;

    /**
     * ID корня
     */
    const ROOT = 1;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description'
    ];

    public function post()
    {
        return $this->hasMany(BlogPost::class);
    }


    /**
     * Получить родительскую категорию
     *
     * @return BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * Пример акцессора
     *
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title ?? ($this->isRoot() ? 'Корень' : '???');

        return $title;
    }

    /**
     * Является ли текущий объект корневым
     *
     * @return bool
     */
    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }

    /**
     * Пример аксесуара
     *
     * @param string $valueFromObject
     */
    public function getTitleAttribute($valueFromObject)
    {
        return mb_strtoupper($valueFromObject);
    }

    /**
     * Пример мутатора
     *
     * @param string $incomingValue
     */
    public function setTitleAttribute(string $incomingValue)
    {
        $this->attributes['title'] = mb_strtolower($incomingValue);
    }
}
