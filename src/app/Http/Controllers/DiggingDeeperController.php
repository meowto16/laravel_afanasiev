<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Support\Carbon;

class DiggingDeeperController extends Controller
{
    /*
     * Базовая информация:
     * @url https://laravel.com/docs/5.8/collections
     *
     * Справочная информация:
     * @url https://laravel.com/api/5.8/Illuminate/Support/Collection.html
     *
     * Вариант коллекции для моделей eloquent:
     * @url https://laravel.com/api/5.8/Illuminate/Database/Eloquent/Collection.html
     *
     * Билдер запросов - то, с чем можно перепутать коллекции:
     * @url https://laravel.com/docs/5.8/queries
     */
    public function collections()
    {
        $result = [];

        /**
         * @var Illuminate\Database\Eloquent\Collection $eloquentCollection
         */

        $eloquentCollection = BlogPost::withTrashed()->get();

//        dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray());

//        dd($eloquentCollection->toArray());
        /**
         * @var Illuminate\Support\Collection $collection;
         */
        $collection = collect($eloquentCollection->toArray());

//        dd(
//            get_class($eloquentCollection),
//            get_class($collection),
//            $collection
//        );

        $result['first'] = $collection->first();
        $result['last'] = $collection->last();
        $result['where']['data'] = $collection
            ->where('category_id', 10)
//            ->values()
            ->keyBy('id')
        ;

        $result['where']['count'] = $collection->count();
        $result['where']['isEmpty'] = $collection->isEmpty();
        $result['where']['isNotEmpty'] = $collection->isNotEmpty();

//        dd($result);

        // Не очень красиво
//        if ($result['where']['count']) {
//            //....
//        }
//
//        // Так лучше
//        if ($result['where']['data']->isNotEmpty()) {
//            //....
//        }

//        $result['where_first'] = $collection
//            ->firstWhere('created_at', '>', '2019-01-17 01:35:11');
//
          // Базовая переменная не изменится. Просто вернется измененная версия.
          $result['map']['all'] = $collection->map(function (array $item) {
              $newItem = new \stdClass();
              $newItem->item_id = $item['id'];
              $newItem->item_name = $item['title'];
              $newItem->exists = is_null($item['deleted_at']);

              return $newItem;
          });

//          $result['map']['not_exists'] = $result['map']['all']->where('exists', '=', false);

          $collection->transform(function (array $item) {
             $newItem = new \stdClass();
             $newItem->item_id = $item['id'];
             $newItem->item_name = $item['title'];
             $newItem->exists = is_null($item['deleted_at']);
             $newItem->created_at = Carbon::parse($item['created_at']);

             return $newItem;
          });

          dd($collection);
    }
}