<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetitionCollection;
use App\Http\Resources\PetitionResource;
use App\Interfaces\PetitionRepositoryInterface;
use App\Models\Category;
use App\Models\Petition;
use App\Repositories\PetitionRepository;
use Givebutter\LaravelKeyable\Auth\AuthorizesKeyableRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PetitionController extends Controller
{
    private PetitionRepositoryInterface $petitionRepository;

    public function __construct(PetitionRepositoryInterface $petitionRepository)
    {
        $this->petitionRepository = $petitionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        return response()->json(new PetitionCollection(Petition::all()), ResponseAlias::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PetitionResource
     */
    public function store(Request $request)
    {
        $petition = Petition::create($request->only([
            'title','description','author','signees'
        ]));
        return new PetitionResource($petition);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petition  $petition
     * @return PetitionResource
     */
    public function show(Petition $petition)
    {
        return new PetitionResource($petition);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petition  $petition
     * @return PetitionResource
     */
    public function update(Request $request, Petition $petition)
    {
        $petition->update($request->only([
            'title','description','author','signees'
        ]));
        return new PetitionResource($petition);
    }

    public function display(Request $request): JsonResponse
    {
        $petitionId = $request->route('id');

        return response()->json([
            'data' => $this->petitionRepository->getPetitionById($petitionId)
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        $name = $request->route('keyword');

        return response()->json([
            'data' => $this->petitionRepository->searchPetition($name)
        ]);
    }

    public function findbycategory(Request $request): JsonResponse
    {
        $categoryId = $request->route('id');

        return response()->json([
            'data' => $this->petitionRepository->getAllPetitionsByCategory($categoryId)
        ]);
    }

    public function sortables(Request $request): JsonResponse
    {

        return response()->json([
            'data' => $this->petitionRepository->getSortedPetition($request->all()),

        ],ResponseAlias::HTTP_OK);
    }

    public function create(Request $request): JsonResponse
    {

        $content = $request->only([
            'title',
            'author',
            'description',
            'signees',
        ]);
        $categoryId = $request['category_id'];

        return response()->json(
            [
                'data' => $this->petitionRepository->createPetition($content,$categoryId)
            ], ResponseAlias::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Petition $petition)
    {
        $petition->delete();
        return response()->json(null,ResponseAlias::HTTP_NO_CONTENT);
    }
}
