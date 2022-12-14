<?php




namespace App\Exceptions;

use Request;
use Response;
use Throwable;
use responseJson;

use Illuminate\Support\Arr;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */


    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }


    protected function unauthenticated($request, AuthenticationException $exception)
        {
            return $request->expectsJson()
            ? responseJson(0,'unauthenticated.')
            : redirect()->guest($exception->redirectTo() ?? route('login'));

            // if ($request->expectsJson()) {
            //     return response()->json(['message' =>  $exception->getMessage(',,,,,,,,,,,pepme')], 401);
            // }

            // $guard = Arr::get($exception->guards(), 0);

            // switch ($guard) {
            //     case 'admin':
            //         $login = 'admin.login';
            //         break;
            //     case 'vendor':
            //         $login = 'vendor.login';
            //         break;

            //     default:
            //         $login = 'login';
            //         break;
            // }

            // return redirect()->guest(route($login));
        }
}















// namespace App\Exceptions;

// use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
// use Throwable;

//     use Exception;
//     use Request;
//     use Illuminate\Auth\AuthenticationException;


// class Handler extends ExceptionHandler
// {
//     /**
//      * A list of exception types with their corresponding custom log levels.
//      *
//      * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
//      */
//     protected $levels = [
//         //
//     ];

//     /**
//      * A list of the exception types that are not reported.
//      *
//      * @var array<int, class-string<\Throwable>>
//      */
//     protected $dontReport = [
//         //
//     ];

//     /**
//      * A list of the inputs that are never flashed to the session on validation exceptions.
//      *
//      * @var array<int, string>
//      */
//     protected $dontFlash = [
//         'current_password',
//         'password',
//         'password_confirmation',
//     ];

//     /**
//      * Register the exception handling callbacks for the application.
//      *
//      * @return void
//      */
//     public function register()
//     {
//         $this->reportable(function (Throwable $e) {
//             //
//         });
//     }



    // public function unauthenticated($request , AuthenticatienException $exception)
    // {
    //     return $request->expectseJson()
     //   //  ? responseJson(0,'unauthenticated')
    //     :redirect()->gest($exception->redirectTo() ?? route('login'));
    // }



// }
