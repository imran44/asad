<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Session;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{

     public function __construct()
    {
         

        $this->middleware('auth');
        $this->middleware('checkforrole:ShopAdmin,SuperAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $categories= Category::all();
        // return view('categories.index')->withCategories($categories);


        $categories = Category::orderBy('id','DESC')->paginate(5);
        return view('categories.index',compact('categories'))
             ->with('i', ($request->input('page', 1) - 1) * 5);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

         $this->validate($request, array
            (
                'name'=>'required|unique:categories|max:255'
            ));
            Category::create($request->all());

            session()->set('success','new category has been created');
             return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    

        $categories = Category::find($id);

        return view('categories.show',compact('categories'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::find($id);

        return view('categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

   
    {
        //
         $this->validate($request, [
            'name' => 'required'
           
        ]);

        Category::find($id)->update($request->all());
                session()->set('success','Category updated successfully');
          return redirect()->route('categories.index');
           
                       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       Category::find($id)->delete();
         session()->set('error','Category deleted successfully');
        return redirect()->route('categories.index');
       
                        
    }
     public function search()
    {

    $q = Input::get ( 'q' );
    if($q != ""){
    $data = Category::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'name', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
    $pagination = $data->appends ( array (
                'q' => Input::get ( 'q' ) 
        ) );
    if (count ( $data ) > 0)
        return view ( 'categories.index' )->withDetails ( $data )->withQuery ( $q );
    }
        return view ( 'categories.index' )->withMessage ( 'No Details found. Try to search again !' );
        //return view('categories/search');
    }

public function autocomplete(Request $request)
    {
        $data = Category::select("name as name")->where("name","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);


    }

}
