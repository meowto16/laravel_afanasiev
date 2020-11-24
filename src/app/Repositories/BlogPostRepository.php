<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     */

    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список статей для вывода в списке
     * (Админка)
     *
     * @param int $paginateCount - Количество страниц.
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($paginateCount = 25)
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            // Заберет все поля из базы
            // Если не делать with - получишь кучу запросов к БД
//            ->with(['category', 'user'])
            ->with([
                // можно так
                'category' => function($query) {
                    $query->select(['id', 'title']);
                },
                // или так
                'user:id,name'
            ])
            ->paginate($paginateCount);

        return $result;
    }
}
