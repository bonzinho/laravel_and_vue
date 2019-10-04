<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticiaCreateRequest;
use App\Http\Requests\NoticiaUpdateRequest;
use App\Models\Tag;
use App\Repositories\NoticiaRepository;


class NoticiasController extends Controller
{

    /**
     * @var NoticiaRepository
     */
    protected $repository;

    public function __construct(NoticiaRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = $this->repository->orderBy('id', 'desc')->paginate();
        return view('admin.noticias.index', compact('noticias'));
    }


    public function create(){
        return view('admin.noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NoticiaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(NoticiaCreateRequest $request)
    {

        $this->repository->skipPresenter(true);
        $data = $request->all();
        $noticia = $this->repository->create($data);
        $noticia->tags()->sync($this->getTagsIds($request['tags']));
        return redirect()->route('admin.noticias.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = $this->repository->find($id);
        return view('admin.noticias.edit', compact('noticia'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  NoticiaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(NoticiaUpdateRequest $request, $id)
    {
        $this->repository->skipPresenter(true);
        $noticia = $this->repository->update($request->all(), $id);
        $noticia->tags()->sync($this->getTagsIds($request['tags']));
        return redirect()->route('admin.noticias.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Noticia deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Noticia deleted.');
    }


    private function getTagsIds($tags){
        // array map passa uam função em todos os elementos do array, sendo que a função neste é o trim para retirar os espaços antes e depois de cada tag
        // array_filter elimina os elementos em branco que existem
        $tagList = array_filter(array_map('trim', explode(',', $tags)));
        $tagsIDs = [];

        foreach ($tagList as $tagName){
            $tagsIDs[] = Tag::firstOrCreate(['tag' => $tagName])->id;
        }

        return $tagsIDs;
    }
}
