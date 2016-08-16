<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = true;
        if (Auth::user()->hasRole(array(
            Config::get('constants.TIER_1_ROLE_NAME'),
            Config::get('constants.TIER_2_ROLE_NAME'),))
        ) {
            $categories = Category::all();
        } else {
            $categories = Auth::user()->categories;
        }
        $length = count($categories);
        if ($request->ajax()) {
            if ($request->wantsJson()) {
                return response()->json(compact(['categories', 'status', 'length']));
            } else {
                return $categories;
            }
        } else {
            //TODO provide a view
            return view('', compact(['categories', 'status', 'length']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO provide a view
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Category|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* validation */
        $validator = Validator::make($request->all(), array(
            'category_name' => 'required|max:255',
            'category_order' => 'integer|max:10',
        ));
        if ($validator->fails()) {
            $status = false;
            $errors = $validator->errors()->all();
            if ($request->ajax()) {
                if ($request->wantsJson()) {
                    return response()->json(compact(['status', 'errors']));
                } else {
                    return $errors;
                }
            } else {
                return redirect()->back()->withInput()->withErrors($errors);
            }
        } else {
            $category = Category::create($request->all());
            $status = true;
            if ($request->ajax()) {
                if ($request->wantsJson()) {
                    return response()->json(compact(['category', 'status']));
                } else {
                    return $category;
                }
            } else {
                //TODO set view or redirect path
                return redirect()->with(compact(['category', 'status']));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $status = true;
            if ($request->ajax()) {
                if ($request->wantsJson()) {
                    return response()->json(compact(['category', 'status']));
                } else {
                    return $category;
                }
            } else {
                //TODO set view
                return view('')->with(compact(['category', 'status']));
            }
        } catch (ModelNotFoundException $e) {
            $status = false;
            $message = $e->getMessage();
            if ($request->ajax()) {
                if ($request->wantsJson()) {
                    return response()->json(compact(['status', 'message']));
                } else {
                    return compact(['status', 'message']);
                }
            } else {
                return redirect()->back()->withInput()->withErrors($message);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
            $status = true;
            //TODO set view
            return view('')->with(compact(['category', 'status']));
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        /* validation */
        $validator = Validator::make($request->all(), array(
            'category_name' => 'max:255',
            'category_order' => 'integer|max:10',
        ));
        if ($validator->fails()) {
            $status = false;
            $errors = $validator->errors()->all();
            if ($request->ajax()) {
                if ($request->wantsJson()) {
                    return response()->json(compact(['status', 'errors']));
                } else {
                    return $errors;
                }
            } else {
                return redirect()->back()->withInput()->withErrors($errors);
            }
        } else {
            $status = true;
            try {
                $category = Category::findOrFail($id);
                $category->update($request->all());
                if ($request->ajax()) {
                    if ($request->wantsJson()) {
                        return response()->json(compact(['status', 'category']));
                    } else {
                        return $category;
                    }
                } else {
                    //TODO set view or redirect path
                    return redirect()->with(compact(['status', 'category']));
                }
            } catch (ModelNotFoundException $e) {
                $status = false;
                $message = $e->getMessage();
                if ($request->ajax()) {
                    if ($request->wantsJson()) {
                        return response()->json(compact(['status', 'errors']));
                    } else {
                        return compact(['status', 'message']);
                    }
                } else {
                    return redirect()->back()->withInput()->withErrors($message);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return bool|\Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            $status = true;
            if ($request->ajax()) {
                if ($request->wantsJson()) {
                    return response()->json(compact(['status']));
                } else {
                    return $status;
                }
            } else {
                //TODO set view or redirect path
                return redirect()->with(compact(['status']));
            }
        } catch (ModelNotFoundException $e) {
            $status = false;
            $message = $e->getMessage();
            if ($request->ajax()) {
                if ($request->wantsJson()) {
                    return response()->json(compact(['status', 'message']));
                } else {
                    return compact(['status', 'message']);
                }
            } else {
                return redirect()->back()->withInput()->withErrors($message);
            }
        }
    }
}
