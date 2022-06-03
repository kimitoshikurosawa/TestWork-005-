<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Petition;

class PetitionRepository implements \App\Interfaces\PetitionRepositoryInterface
{

    public function getAllPetitions(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Petition::all();
    }

    public function getPetitionById($petitionId)
    {

        return Petition::find($petitionId);


    }

    public function getSortedPetition(array $filters)
    {
        $query = new Petition;
        $petition = $query->newQuery();

        if (isset($filters["title"])) {
            $petition->where('title', $filters['title']);
        }


        if (isset($filters['category'])) {
            $category = $filters["category"];

            $petition->whereHas('categories', function ($q) use ($category) {
                $q->where('title', 'LIKE',  '% ' . $category . '%')->orWhere('description', 'LIKE',  '% ' . $category . '%');
            });
        }


        if (isset($filters["author"])) {
            $petition->where('author', 'LIKE', '% ' . $filters["author"] . '%');
        }

        if (isset($filters["description"])) {
            $petition->where('description', 'LIKE', '% ' . $filters["description"] . '%');
        }

        if(isset($filters["signeesBetween"][0]) || isset($filters["signeesBetween"][1])){
            $petition->whereBetween('signees', [$filters["signeesBetween"][0], $filters["signeesBetween"][1]]);
        }

        return $petition->get();

    }

    public function getAllPetitionsByCategory($categoryId)
    {

        return Petition::whereHas('categories', function ($q) use ($categoryId) {
            $q->where('id', $categoryId);
        })->get();


    }

    public function searchPetition($name)
    {

        return Petition::where('title', 'LIKE', '% ' . $name . '%')->orWhere('description', 'LIKE','% '. $name . '%')
            ->get();


    }

    public function createPetition($content,$categoryId)
    {
        $category = Category::find($categoryId);
        Petition::create($content)->categories()->attach($category);



        return 'Petition Created' ;
    }
}
