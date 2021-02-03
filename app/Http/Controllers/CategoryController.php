<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller {

	public function index() {
		$categories = Category::latest()->get();
		return view('categories.index', ['categories' => $categories]);
	}


	public function create() {
		return view('categories.create');
	}

	public function store(Request $request) {
		// dd($request->name);
		  //image upload
		  $rules = [
            'name'=> ['required', 'min:3', 'max:160'],
       
        ];
		$this->validate($request, $rules);
		$input['meta_title'] = str_limit($request->title, 55);
		$input['meta_description'] = str_limit($request->body, 155);
        $input = $request->all();
        $input['slug'] =Str::slug($request->name);

        //image upload
        if($file = $request->file('featured_image')){
            $name = uniqid() . $file->getClientOriginalName();
            $name = strtolower(str_replace(' ', '-', $name));
            $file->move('images/post_image/', $name);
            $input['featured_image'] = $name;
        }
         $categories = Category::create($input);
   
        return redirect('/');


		return back();
	}


	public function show($slug) {
		$category = Category::where('slug', $slug)->first();
		return view('categories.show', compact('category'));
	}


	public function edit($id) {
		$category = Category::findOrFail($id);
		return view('categories.edit', compact('category'));
	}


	public function update(Request $request, $id) {
		// $category = Category::findOrFail($id);
		// $category->name = $request->name;
		// $category->slug = str_slug($request->name, '-');
		// $category->save();
		// return redirect('categories');
		$input = $request->all();
		$categories = Category::findOrFail($id);

		if($file = $request->file('featured_image')){
			if($categories->featured_image){
				unlink('images/post_image/' . $categories->featured_image);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['featured_image'] = $name;

		}

		$categories->update($input);

		return redirect('categories');
	}

	public function destroy($id) {
		$category = Category::findOrFail($id);
		$category->delete();
		return redirect('categories');
	}
}
