<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Events\AfterInsertAndEditSecondDestaqueEvent;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SecondNotificacaoCreateRequest;
use App\Http\Requests\SecondNotificacaoUpdateRequest;
use App\Repositories\SecondNotificacaoRepository;


class SecondNotificacaosController extends Controller
{

    /**
     * @var SecondNotificacaoRepository
     */
    protected $repository;

    public function __construct(SecondNotificacaoRepository $repository)
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
        return view('admin.second_notificacao.index', compact('notificacao', 'notificacoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SecondNotificacaoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SecondNotificacaoCreateRequest $request)
    {
        try {
            $date = Carbon::now();
            $request['week'] = $date->format("W");
            $request['year'] = $date->format("Y");
            $destaque = $this->repository->create($request->all());
            $event = new AfterInsertAndEditSecondDestaqueEvent($request->img, $destaque);
            event($event);
            Toast()->green('Segundo Destaque criado com sucesso', 'green', 'Destaque');
            return redirect()->back();

        } catch (ValidatorException $e) {
            Toast()->red('Erro!! Tente novamente', 'red', 'Destaque');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SecondNotificacaoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SecondNotificacaoUpdateRequest $request, $id)
    {
        try {
            $destaque = $this->repository->update($request->all(), $id);
            $event = new AfterInsertAndEditSecondDestaqueEvent($request->img, $destaque);
            event($event);
            Toast()->green('Segundo Destaque editado com sucesso', 'green', 'Destaque');
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
        return view('admin.second_notificacao.edit', compact('notificacao'));
    }

}
