<?php

namespace App\Http\Controllers;

use App\Services\PetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PetController extends Controller {
    protected $petService;

    public function __construct(PetService $petService) {
        $this->petService = $petService;
    }

    public function index() {
        $pets = $this->petService->getAllPets();
        return view('pets.index', compact('pets'));
    }

    public function show($id)
    {
        try {
            $response = Http::get("https://petstore.swagger.io/v2/pet/{$id}");

            if ($response->successful()) {
                $pet = $response->json();
                return view('pets.show', compact('pet'));
            } else {
                return back()->with('error', 'The animal with the given ID was not found.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while retrieving the data: ' . $e->getMessage());
        }
    }


    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        try {
            $response = Http::post('https://petstore.swagger.io/v2/pet', [
                'id' => rand(1000000000, 9999999999),
                'name' => $request->input('name'),
                'status' => $request->input('status'),
            ]);

            if ($response->successful()) {
                return redirect()->route('pets.index')->with('success', 'The pet has been added!');
            } else {
                return back()->withErrors(['error' => 'Failed to add pet: ' . $response->body()]);
            }

            return redirect()->back()->withErrors('An error occurred while adding the pet.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        try {
            $response = Http::get("https://petstore.swagger.io/v2/pet/{$id}");

            if ($response->successful()) {
                $pet = $response->json();
                return view('pets.edit', compact('pet'));
            } else {
                return redirect()->route('pets.index')->with('error', 'Pet with the given ID not found');
            }
        } catch (\Exception $e) {
            return redirect()->route('pets.index')->with('error', 'An error occurred while fetching data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:available,pending,sold',
        ]);

        try {
            $response = Http::put("https://petstore.swagger.io/v2/pet", [
                'id' => $id,
                'name' => $validatedData['name'],
                'status' => $validatedData['status'],
            ]);

            if ($response->successful()) {
                return redirect()->route('pets.index')->with('success', 'Pet has been updated successfully!');
            } else {
                return redirect()->back()->withErrors('An error occurred while updating the pet: ' . $response->body());
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred: ' . $e->getMessage());
        }
    }


    public function destroy($id) {
        $this->petService->deletePet($id);
        return redirect()->route('pets.index');
    }
}
