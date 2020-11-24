<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;

class CategoryController extends BaseController
{
    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {

        $paginator = $this->blogCategoryRepository->getAllWithPaginate(5);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view(
            'blog.admin.categories.edit',
            compact('item', 'categoryList')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\BlogCategoryCreateRequest; $request
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = str_slug($data['title']);
        }

        // Создаст объект но не добавит в БД
        $item = (new BlogCategory($data))->create($data);
        $item->save();

        if ($item) {
            return redirect()
                    ->route('blog.admin.categories.edit', [$item->id])
                    ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param BlogCategoryRepository $categoryRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function edit($id, BlogCategoryRepository $categoryRepository)
    {
          $item = $categoryRepository->getEdit($id);
          if (empty($item)) {
              abort(404);
          }

          $categoryList = $categoryRepository->getForComboBox();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\BlogCategoryUpdateRequest $request
     * @param int $id

     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
//        $rules = [
//            'title' => 'required|min:5|max:200',
//            'slug' => 'max:200',
//            'description' => 'string|max:500|min:3',
//            'parent_id' => 'required|integer|exists:blog_categories,id',
//        ];

//        $validatedData = $request->validate($rules);

//        dd($validatedData);

//        $validator = \Validator::make($request->all(), $rules);
//        $validatedData[] = $validator->passes();
//        $validatedData[] = $validator->validate();
//        $validatedData[] = $validator->valid();
//        $validatedData[] = $validator->failed();
//        $validatedData[] = $validator->errors();
//        $validatedData[] = $validator->fails();
//
//        dd($validatedData);

        $item = BlogCategory::find($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}} не найдена]"])
                ->withInput();
        }

        $data = $request->all();
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
