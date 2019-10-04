<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Events\AfterInsertAndEditDestaqueEvent;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\NotificacaoCreateRequest;
use App\Http\Requests\NotificacaoUpdateRequest;
use App\Repositories\NotificacaoRepository;


class NotificacaosController extends Controller
{

    /**
     * @var NotificacaoRepository
     */
    protected $repository;

    public function __construct(NotificacaoRepository $repository)
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
        $notificacoes = $this->repository->orderBy('id', 'desc')->all();
        return view('admin.notificacoes.index', compact('notificacao', 'notificacoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NotificacaoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(NotificacaoCreateRequest $request)
    {
        try {
            $date = Carbon::now();
            $request['week'] = $date->format("W");
            $request['year'] = $date->format("Y");
            $destaque = $this->repository->create($request->all());
            $event = new AfterInsertAndEditDestaqueEvent($request->img, $destaque);
            event($event);
            Toast()->green('Destaque criado com sucesso', 'green', 'Destaque');
            return redirect()->back();

        } catch (ValidatorException $e) {
            Toast()->red('Erro!! Tente novamente', 'red', 'Destaque');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NotificacaoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(NotificacaoUpdateRequest $request, $id)
    {
        try {
            $destaque = $this->repository->update($request->all(), $id);
            $event = new AfterInsertAndEditDestaqueEvent($request->img, $destaque);
            event($event);
            Toast()->green('Destaque editado com sucesso', 'green', 'Destaque');
            return redirect()->back();

        } catch (ValidatorException $e) {
            Toast()->red('Erro!! Tente novamente', 'red', 'Destaque');
            return redirect()->back();
        }
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
        $notificacao = $this->repository->find($id);
        return view('admin.notificacoes.edit', compact('notificacao'));
    }

}
