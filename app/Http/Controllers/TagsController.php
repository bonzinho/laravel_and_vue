<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Repositories\TagRepository;



class TagsController extends Controller
{

    /**
     * @var TagRepository
     */
    protected $repository;



    public function __construct(TagRepository $repository)
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
        $this->repository->skipPresenter();
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $tags = $this->repository->all();
        return view('tags.index', compact('tags'));
    }

    public function create(){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TagCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TagCreateRequest $request)
    {
            $tag = $this->repository->create($request->all());
            return redirect()->back()->with('message', $response['message']);

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

        $tag = $this->repository->find($id);

        return view('tags.edit', compact('tag'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TagUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
            $tag = $this->repository->update($request->all(), $id);

            return redirect()->back()->with('message', $response['message']);

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
                'message' => 'Tag deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Tag deleted.');
    }
}
