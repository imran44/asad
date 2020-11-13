<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Item;
use App\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller {

	public function __construct() {

		//$this->middleware('auth');

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		$jobs = Jobs::orderBy('id', 'DESC')->paginate(5);
		return view('jobs.index', compact('jobs'))
			->with('i', ($request->input('page', 1) - 1) * 5);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$categories = Category::all();
		return view('Item.create')->withCategories($categories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'title' => 'required',
			'catagory_id' => 'required|integer',
			'description' => 'required',
		]);

		Item::create($request->all());
		session()->set('success', ' Item created successfully');
		return redirect()->route('item.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$item = Item::find($id);

		return view('Item.show', compact('item'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$item = Item::find($id);

		//categories grab
		$categories = Category::all();
		$cats = array();
		foreach ($categories as $category) {
			$cats[$category->id] = $category->name;
		}

		return view('Item.edit', compact('item'))->withCategories($cats);
		//return view('Item.edit')->withitem($item)->withCategories($cats);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->validate($request, [
			'title' => 'required',
			'catagory_id' => 'required|integer',
			'description' => 'required',
		]);

		Item::find($id)->update($request->all());

		// $item = Item::find($id);
		// $item->title=$request->input('title');
		// $item->catagory_id=$request->input('catagory_id');
		// $item->description=$request->input('description');

		// $item->save();

		session()->set('success', ' Item updated successfully');
		return redirect()->route('item.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Item::find($id)->delete();
		session()->set('error', ' Item deleted successfully');
		return redirect()->route('item.index');
		// ->with('success','Item deleted successfully');
	}
}
