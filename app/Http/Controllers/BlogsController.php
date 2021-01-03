<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Category;
use App\Mail\BlogPublished;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class BlogsController extends Controller {

	public function __construct() {
		$this->middleware('author', ['only' => ['create', 'store', 'edit', 'update']]);
		$this->middleware('admin', ['only' => ['delete', 'trash', 'restore', 'permanentDelete']]);
	}

	public function index() {
		// $blogs = Blog::where('status', 1)->latest()->get();
		$blogs = Blog::latest()->paginate(10);
		return view('blogs.index', compact('blogs'));
	}

	public function create() {
		$categories = Category::latest()->get();
		return view('blogs.create', compact('categories'));
	}

	public function store(Request $request) {
		// validate
		$rules = [
			'title' => ['required', 'min:5', 'max:160'],
			'body' => ['required', 'min:5'],
		];

		$this->validate($request, $rules);

		$input = $request->all();
		// meta stuff
		$input['slug'] = str_slug($request->title);
		$input['meta_title'] = str_limit($request->title, 55);
		$input['meta_description'] = str_limit($request->body, 155);
		
		// image upload
		if ($file = $request->file('featured_image')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/featured_image/', $name);
			$input['featured_image'] = $name;
		}

		if ($file = $request->file('image0')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image0'] = $name;
		}

		if ($file = $request->file('image1')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image1'] = $name;
		}

		if ($file = $request->file('image2')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image2'] = $name;
		}

		if ($file = $request->file('image3')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image3'] = $name;
		}

		if ($file = $request->file('image4')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image4'] = $name;
		}

		if ($file = $request->file('image5')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image5'] = $name;
		}

		if ($file = $request->file('image6')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image6'] = $name;
		}

		if ($file = $request->file('image7')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image7'] = $name;
		}

		if ($file = $request->file('image8')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image8'] = $name;
		}

		if ($file = $request->file('image9')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image9'] = $name;
		}

		if ($file = $request->file('image10')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image10'] = $name;
		}

		if ($file = $request->file('image11')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image11'] = $name;
		}

		if ($file = $request->file('image12')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image12'] = $name;
		}

		if ($file = $request->file('image13')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image13'] = $name;
		}

		if ($file = $request->file('image14')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image14'] = $name;
		}

		if ($file = $request->file('image15')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image15'] = $name;
		}

		if ($file = $request->file('image16')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image16'] = $name;
		}

		if ($file = $request->file('image17')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image17'] = $name;
		}
		if ($file = $request->file('image18')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image18'] = $name;
		}
		if ($file = $request->file('image19')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image19'] = $name;
		}

		if ($file = $request->file('image20')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image20'] = $name;
		}

		
		//  for ($x = 1; $x <= 20; $x++){
		// 	if ($file = $request->file('image{{$x}}')) {
		// 		$name = ['' => uniqid() . $file->getClientOriginalName()];
		// 		// $name = strtolower(str_replace(' ', '-', $name));
		// 		$file->move('images/post_image/', $name);
		// 		$input['image{{$x}}'] = $name;
		// 	}
		//  }

		 //$blog = Blog::create($input);
		$blogByUser = $request->user()->blogs()->create($input);
		// sync with categories
		if ($request->category_id) {
			$blogByUser->category()->sync($request->category_id);
		}

		// mail
		// $users = User::all();
		// foreach ($users as $user) {
		// 	Mail::to($user->email)->queue(new BlogPublished($blogByUser, $user));
		// }

		Session::flash('blog_created_message', 'Congratulations on createing a great blog!');

		return redirect('/blogs');
	}

	public function show($slug) {
		// $blog = Blog::findOrFail($id);
		$blog = Blog::whereSlug($slug)->first();
		return view('blogs.show', compact('blog'));
	}

	public function edit($id) {
		$categories = Category::latest()->get();
		$blog = Blog::findOrFail($id);

		$bc = array();
		foreach ($blog->category as $c) {
			$bc[] = $c->id - 1;
		}

		$filtered = array_except($categories, $bc);

		return view('blogs.edit', ['blog' => $blog, 'categories' => $categories, 'filtered' => $filtered]);
	}

	public function update(Request $request, $id) {
		// dd($request->all());
		$input = $request->all();
		$blog = Blog::findOrFail($id);

		if ($file = $request->file('featured_image')) {
			if ($blog->featured_image) {
				unlink('images/featured_image/' . $blog->featured_image);
			}

			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/featured_image/', $name);
			$input['featured_image'] = $name;
		}

		if ($file = $request->file('image0')) {
			if ($blog->image0) {
				unlink('images/post_image/' . $blog->image0);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image0'] = $name;
		}

		if ($file = $request->file('image1')) {
			if ($blog->image1) {
				unlink('images/post_image/' . $blog->image1);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image1'] = $name;
		}

		if ($file = $request->file('image2')) {
			if ($blog->image2) {
				unlink('images/post_image/' . $blog->image2);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image2'] = $name;
		}

		if ($file = $request->file('image3')) {
			if ($blog->image3) {
				unlink('images/post_image/' . $blog->image3);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image3'] = $name;
		}

		if ($file = $request->file('image4')) {
			if ($blog->image4) {
				unlink('images/post_image/' . $blog->image4);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image4'] = $name;
		}

		if ($file = $request->file('image5')) {
			if ($blog->image5) {
				unlink('images/post_image/' . $blog->image5);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image5'] = $name;
		}

		if ($file = $request->file('image6')) {
			if ($blog->image6) {
				unlink('images/post_image/' . $blog->image6);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image6'] = $name;
		}

		if ($file = $request->file('image7')) {
			if ($blog->image7) {
				unlink('images/post_image/' . $blog->image7);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image7'] = $name;
		}

		if ($file = $request->file('image8')) {
			if ($blog->image8) {
				unlink('images/post_image/' . $blog->image8);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image8'] = $name;
		}

		if ($file = $request->file('image9')) {
			if ($blog->image9) {
				unlink('images/post_image/' . $blog->image9);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image9'] = $name;
		}

		if ($file = $request->file('image10')) {
			if ($blog->image10) {
				unlink('images/post_image/' . $blog->image10);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image10'] = $name;
		}

		if ($file = $request->file('image11')) {
			if ($blog->image11) {
				unlink('images/post_image/' . $blog->image11);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image11'] = $name;
		}

		if ($file = $request->file('image12')) {
			if ($blog->image12) {
				unlink('images/post_image/' . $blog->image12);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image12'] = $name;
		}

		if ($file = $request->file('image13')) {
			if ($blog->image13) {
				unlink('images/post_image/' . $blog->image13);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image13'] = $name;
		}

		if ($file = $request->file('image14')) {
			if ($blog->image14) {
				unlink('images/post_image/' . $blog->image14);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image14'] = $name;
		}

		if ($file = $request->file('image15')) {
			if ($blog->image15) {
				unlink('images/post_image/' . $blog->image15);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image15'] = $name;
		}

		if ($file = $request->file('image16')) {
			if ($blog->image16) {
				unlink('images/post_image/' . $blog->image16);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image16'] = $name;
		}

		if ($file = $request->file('image17')) {
			if ($blog->image17) {
				unlink('images/post_image/' . $blog->image17);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image17'] = $name;
		}

		if ($file = $request->file('image18')) {
			if ($blog->image18) {
				unlink('images/post_image/' . $blog->image18);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image18'] = $name;
		}

		if ($file = $request->file('image19')) {
			if ($blog->image19) {
				unlink('images/post_image/' . $blog->image19);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image19'] = $name;
		}

		if ($file = $request->file('image20')) {
			if ($blog->image20) {
				unlink('images/post_image/' . $blog->image20);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/post_image/', $name);
			$input['image20'] = $name;
		}

		$blog->update($input);
		// sync with categories
		if ($request->category_id) {
			$blog->category()->sync($request->category_id);
		}
		return redirect('blogs');
	}

	public function delete($id) {
		$blog = Blog::findOrFail($id);
		$blog->delete();
		return redirect('blogs');
	}

	public function trash() {
		$trashedBlogs = Blog::onlyTrashed()->get();
		return view('blogs.trash', compact('trashedBlogs'));
	}

	public function restore($id) {
		$restoredBlog = Blog::onlyTrashed()->findOrFail($id);
		$restoredBlog->restore($restoredBlog);
		return redirect('blogs');
	}

	public function permanentDelete($id) {
		$permanentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
		$permanentDeleteBlog->forceDelete($permanentDeleteBlog);
		return redirect('blogs');
	}

}