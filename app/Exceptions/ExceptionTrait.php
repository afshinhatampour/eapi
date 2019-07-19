<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


trait ExceptionTrait
{

  public function apiException($request, $exception)
  {


    if ($this->isModel($exception)) {
      return response()->json("Model not found", 404);
    }


    if ($this->isHttp($exception)) {
      return response()->json("Route not found", 404);
    }
    return parent::render($request, $exception);
  }



  public function isModel($exception)
  {
    return $exception instanceof ModelNotFoundException;
  }



  public function isHttp($exception)
  {
    return $exception instanceof NotFoundHttpException;
  }
}
