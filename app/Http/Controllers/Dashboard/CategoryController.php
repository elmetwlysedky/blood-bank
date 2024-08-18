<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryRepo;


    public function __construct(CategoryRepository $categoryRepo,)
    {

        $this->categoryRepo=$categoryRepo;

    }

    public function index()
    {
        return view('Dashboard.Category.index',[
        'categories' => $this->categoryRepo->all()]
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|string|max:225']);
        $this->categoryRepo->create($request);
        session()->flash('success', __('main.added_success'));
        return to_route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->categoryRepo->show($id);
        return view('Dashboard.Category.show',[
            'categories'=> $data

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('Dashboard.Category.edit',[
            'category'=>$this->categoryRepo->show($id)
        ]);
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
        $request->validate(['name'=>'required|string|max:225']);
        $this->categoryRepo->edit($request,$id);
        session()->flash('success',__('main.edited_success'));
        return to_route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->categoryRepo->delete($id);
        session()->flash('delete', __('main.deleted_success'));
        return redirect()->back();
    }
}
