<?php

namespace App\Presenters;

use App\Transformers\InstagramTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class InstagramPresenter
 *
 * @package namespace feupWorld\Presenters;
 */
class InstagramPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new InstagramTransformer();
    }
}
