<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Repositories\NoticiaRepository;
use App\Repositories\EventoRepository;


class HomeController extends Controller
{


    /**
     * @var EventoRepository
     */
    protected $eventoRepository;
    /**
     * @var NoticiaRepository
     */
    protected $noticiaRepository;


    public function __construct(EventoRepository $eventoRepository, NoticiaRepository $noticiaRepository)
    {

        $this->eventoRepository = $eventoRepository;
        $this->noticiaRepository = $noticiaRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = $this->eventoRepository->paginate(5);
        $noticias = $this->noticiaRepository->paginate(5);

        return response()->json([
            'eventos' => $eventos,
            'noticias' => $noticias,
        ]);

    }
}
