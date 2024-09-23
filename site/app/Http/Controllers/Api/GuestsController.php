<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guests\GuestCreateRequest;
use App\Http\Requests\Guests\GuestUpdateRequest;
use App\Http\Resources\GuestResource;
use App\Models\Guest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpKernel\Exception\HttpException;

class GuestsController extends Controller
{
    /**
     * Display items of the resource
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return GuestResource::collection(Guest::all());
    }

    /**
     * Store a newly created resource in storage
     *
     * @param GuestCreateRequest $request
     * @return GuestResource|JsonResponse
     */
    public function store(GuestCreateRequest $request): GuestResource|JsonResponse
    {
        try {
            $guest = new Guest();
            $guest->fill($request->validated())->save();

            return new GuestResource($guest);

        } catch(Exception $exception) {
            return response()->json(['error' => "Invalid data - {$exception->getMessage()}"], 400);
        }
    }

    /**
     * Display the specified resource
     *
     * @param int $id
     * @return GuestResource
     */
    public function show($id): GuestResource
    {
        $guest = Guest::findOrFail($id);

        return new GuestResource($guest);
    }


    /**
     * Update the specified resource in storage
     *
     * @param GuestUpdateRequest $request
     * @param int $id
     * @return GuestResource
     */
    public function update(GuestUpdateRequest $request, int $id): GuestResource
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        try {
            $guest = Guest::find($id);
            $guest->fill($request->validated())->save();

            return new GuestResource($guest);

        } catch(Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
        }
    }

    /**
     * Remove the specified resource from storage
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $guest = Guest::findOrfail($id);
        $guest->delete();

        return response()->json(null, 204);
    }
}
