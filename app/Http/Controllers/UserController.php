<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Spatie\FlareClient\Http\Exceptions\BadResponse;

class UserController extends Controller
{
    public function index() : View
    {
        $perPage = 5;
        $users = User::where('id', '!=', Auth::user()->id)->paginate($perPage);
        $options =
        [
            'Administrador' => 'Administrador',
            'Vendedor' => 'Vendedor',
            'Facturador' => 'Facturador',
        ];
        return view('users.index', compact('users', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try
        {
            $request->validate
            ([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'roles' => ['required', 'string', 'max:255'],
            ]);

            $user = User::create
            ([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole($request->roles);

            event(new Registered($user));

            return response()->json(["message" => "Se ha registrado el usuario correctamente"], 200);
        }
        catch (Exception $ex)
        {
            Log::info(Carbon::now()->getTimestamp().' - '.$ex->getMessage());
            return response()->json(["message" => "Lo sentimos, hubo un error inesperado"], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): JsonResponse
    {
        try
        {
            $request->validate
            ([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'roles' => ['required', 'string', 'max:255'],
            ]);

            $userDb = User::find($user->id);
            $userDb->name = $request->name;
            $userDb->email = $request->email;
            $userDb->save();
            $userDb->removeRole($user->getRoleNames()[0]);
            $userDb->assignRole($request->roles);

            return response()->json(["message" => "Se ha editado el usuario correctamente"], 200);
        }
        catch (Exception $ex)
        {
            Log::info(Carbon::now()->getTimestamp().' - '.$ex->getMessage());
            return response()->json(["message" => "Lo sentimos, hubo un error inesperado"], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): JsonResponse
    {
        try
        {
            User::destroy($user->id);
            return response()->json(["message" => "Se ha eliminado el usuario correctamente"], 200);
        }
        catch (Exception $ex)
        {
            Log::info(Carbon::now()->getTimestamp().' - '.$ex->getMessage());
            return response()->json(["message" => "Hubo un error inesperado"], 500);
        }
    }
}
