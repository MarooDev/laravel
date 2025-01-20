<?php

namespace App\Http\Controllers;

use App\Services\PetService;
use Illuminate\Http\Request;

class PetController extends Controller {
    protected $petService;

    public function __construct(PetService $petService) {
        $this->petService = $petService;
    }

    public function index() {
        $pets = $this->petService->getAllPets();
        return view('pets.index', compact('pets'));
    }

    public function show($id) {
        $pet = $this->petService->getPet($id);
        return view('pets.show', compact('pet'));
    }

    public function create() {
        return view('pets.create');
    }

    public function store(Request $request) {
        $this->petService->addPet($request->all());
        return redirect()->route('pets.index');
    }

    public function edit($id) {
        $pet = $this->petService->getPet($id);
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        $data['id'] = $id;
        $this->petService->updatePet($data);
        return redirect()->route('pets.index');
    }

    public function destroy($id) {
        $this->petService->deletePet($id);
        return redirect()->route('pets.index');
    }
}
