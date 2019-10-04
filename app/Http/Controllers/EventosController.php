<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Evento;
use App\Http\Requests\EventoCreateRequest;
use App\Http\Requests\EventoUpdateRequest;
use App\Repositories\EventoRepository;


class EventosController extends Controller
{

    /**
     * @var EventoRepository
     */
    protected $repository;


    public function __construct(EventoRepository $repository)
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
        $eventos = $this->repository->orderBy('id', 'desc')->paginate();
        return view('admin.eventos.index', compact('eventos'));
    }

    public function create(){
        return view('admin.eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EventoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EventoCreateRequest $request)
    {
        //$date = new \DateTime($request['init']);
        $date = Carbon::createFromFormat('Y-m-d', $request['init']);
        $request['week'] = $date->format("W");
        $request['year'] = $date->format("Y");
        $weekNumbers = $date->diffInWeeks(Carbon::createFromFormat('Y-m-d', $request['end']));
        //dd($weekNumbers);
        $evento = $this->repository->create($request->all());
        $array = []; // vai conter as semanas em que o evento vai ser mostrado
        for($x = 0; $x <= $weekNumbers; $x++){
            $array[$x]['week'] = $request['week'] + $x;
            $array[$x]['year'] = $request['year'];
            $array[$x]['evento_id'] = $evento->id;
        }
        $evento->week_events()->insert($array);
        return redirect()->route('admin.eventos.index');
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
        $evento = $this->repository->find($id);
        return view('admin.eventos.edit', compact('evento'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EventoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(EventoUpdateRequest $request, $id)
    {
        $date = new \DateTime($request['init']);
        $request['week'] = $date->format("W");
        $request['year'] = $date->format("Y");
        $evento = $this->repository->update($request->all(), $id);
        return redirect()->route('admin.eventos.index');
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
                'message' => 'Evento deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Evento deleted.');
    }
}
