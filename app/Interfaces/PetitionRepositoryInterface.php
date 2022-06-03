<?php

namespace App\Interfaces;

interface PetitionRepositoryInterface
{
    public function getAllPetitions();
    public function getAllPetitionsByCategory($categoryId);
    public function getPetitionById($petitionId);
    public function searchPetition($name);
    public function getSortedPetition(array $filters);
    public function createPetition($content,$categoryId);


}
