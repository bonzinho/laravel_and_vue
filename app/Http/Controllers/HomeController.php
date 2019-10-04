<?php

namespace App\Http\Controllers;

use AppApp\Models\Newsletter;
use App\Models\Subscriber;
use App\Repositories\NewsletterRepository;
use App\Repositories\NoticiaRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{

    /**
     * @var NewsletterRepository
     */
    private $newsletter;
    /**
     * @var NoticiaRepository
     */
    private $noticias;

    public function __construct(NewsletterRepository $newsletter, NoticiaRepository $noticias)
    {
        $this->newsletter = $newsletter;
        $this->noticias = $noticias;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $newsletters = $this->newsletter->all();
        $queryArray = [
            ['created_at', '>=', date('Y')]
        ];
        $noticias =  $this->noticias->findWhere($queryArray);

        return view('home', compact('newsletters', 'noticias'));
    }

    public function exportSubscribers(){
        $subscribers = Subscriber::all()->pluck('email')->toArray();
        $arrayToExport = [];
        for($x = 0; $x < count($subscribers); $x++){
            $arrayToExport[$x] = [$subscribers[$x]];
        }

        Excel::create('subscribers', function($excel) use ($arrayToExport) {

            $excel->sheet('Subscritores', function($sheet) use ($arrayToExport)  {
                $sheet->fromArray($arrayToExport, null, 'A1', false, false);
            });

        })->export('csv');

        return back();
    }
}
