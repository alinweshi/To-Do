<?php

namespace App\Http\Controllers\Api;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CategoryResource;
use App\Interfaces\BaseRepositoryInterface;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function __construct(protected BaseRepositoryInterface $categoryRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->categoryRepository->getAll());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($request)
    {
        $user_id = Auth::id();
        // dd($user_id);
        $validated = $request->validated();
        $validated['user_id'] = $user_id;
        // dd($validated);
        // Debugging: Check the validated data
        Log::info('Validated Data:', $validated);

        $category = $this->categoryRepository->create($validated);

        // Debugging: Check if status is present after creation
        Log::info('Created Category:', $category->toArray());

        return response()->json(['message' => 'Category created successfully', 'category' => new CategoryResource($category)], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $user_id = Auth::id();
        // dd($user_id);
        $validated = $request->validated();
        $validated['user_id'] = $user_id;
        // dd($validated);
        // Debugging: Check the validated data
        Log::info('Validated Data:', $validated);

        $category = $this->categoryRepository->create($validated);

        // Debugging: Check if status is present after creation
        Log::info('Created Category:', $category->toArray());

        return response()->json(['message' => 'Category created successfully', 'category' => new CategoryResource($category)], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json(new CategoryResource($category));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $updated = $this->categoryRepository->update($category, $validated);

        return $updated ? response()->json(['message' => 'Category updated successfully']) :
            response()->json(['error' => 'Category not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $deleted = $this->categoryRepository->delete($category);

        return $deleted ? response()->json(['message' => 'Category deleted successfully']) :
            response()->json(['error' => 'Category not found'], 404);
    }
}
