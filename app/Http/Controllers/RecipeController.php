<?php
// app/Http/Controllers/ResepController.php
namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function AdminIndex()
    {
        return view('admin.resep');
    }
    public function index()
    {
        $recipes = Recipe::all();
        return view('resep', ['recipes' => $recipes]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'ingredients' => 'required',
            'recipe' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image_path')) {
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
        }

        $recipe = new Recipe;
        $recipe->title = $request->title;
        $recipe->ingredients = $request->ingredients;
        $recipe->recipe = $request->recipe;
        $recipe->image_path = $imageName;
        $recipe->save();

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);
    }
    public function destroy($id)
    {
        $recipe = Recipe::find($id);

        if ($recipe) {
            $recipe->delete();

            return redirect()->route('admin.recipe')->with('success', 'Recipe deleted successfully.');
        } else {
            return redirect()->route('admin.recipe')->with('error', 'Recipe not found.');
        }
    }
    public function show($id)
    {
        $recipe = Recipe::find($id);
        if ($recipe) {
            return view('resep_detail', ['recipe' => $recipe]);
        } else {
            return redirect()->route('resep')->with('error', 'Recipe not found.');
        }
    }
}
