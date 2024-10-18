<?php

namespace Core\Auth\Controllers\API\V1;

use Core\Auth\Models\User;
use Core\Auth\Requests\UserRequest as CustomRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends \Core\Base\Controllers\API\Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @codeCoverageIgnore
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['login']]);
    }

    /**
     * Get the token via given credentials.
     *
     * @param CustomRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(CustomRequest $request)
    {
        $user = User::where('email', $request->email)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return $this->sendResponse([], 'The provided credentials are incorrect.', 401);
        }
     
        return $this->sendResponse(['token' => $user->createToken('api-token', [
            'place-orders',
            'update-orders',
            'delete-orders',
            'view-orders',
        ])->plainTextToken]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        request()->user()->currentAccessToken()->delete();
        return $this->sendResponse([], 'Successfully logged out.');
    }
}