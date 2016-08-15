<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Validator;

class ProductController extends Controller
{

    public function __construct()
    {
        //handle CRUD middleware here
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param null $user_id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = true;
        if (Auth::user()->hasRole(array(
            Config::get('constants.TIER_1_ROLE_NAME'),
            Config::get('constants.TIER_2_ROLE_NAME'),))
        ) {
            $products = Product::all();
        } else {
            $products = Auth::user()->products();
        }
        $length = count($products);
        if ($request->ajax()) {
            if ($request->wantsJson()) {
                return response()->json(compact(['products', 'status', 'length']));
            } else {
                return $products;
            }
        } else {
            //TODO provide a view
            return view('', compact(['products', 'status', 'length']));
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
     * @return Product|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* validation */
        $validator = Validator::make($request->all(), array(
            'product_name' => 'required|max:255',
            'product_order' => 'integer|max:10',
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
            $product = Product::create($request->all());
            $status = true;
            if ($request->ajax()) {
                if ($request->wantsJson()) {
                    return response()->json(compact(['product', 'status']));
                } else {
                    return $product;
                }
            } else {
                //TODO set view or redirect path
                return redirect()->with(compact(['product', 'status']));
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
            $product = Product::findOrFail($id);
            $status = true;
            if ($request->ajax()) {
                if ($request->wantsJson()) {
                    return response()->json(compact(['product', 'status']));
                } else {
                    return $product;
                }
            } else {
                //TODO set view
                return view('')->with(compact(['product', 'status']));
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
            $product = Product::findOrFail($id);
            $status = true;
            //TODO set view
            return view('')->with(compact(['product', 'status']));
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
            'product_name' => 'max:255',
            'product_order' => 'integer|max:10',
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
                $product = Product::findOrFail($id);
                $product->update($request->all());
                if ($request->ajax()) {
                    if ($request->wantsJson()) {
                        return response()->json(compact(['status', 'product']));
                    } else {
                        return $product;
                    }
                } else {
                    //TODO set view or redirect path
                    return redirect()->with(compact(['status', 'product']));
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
            $product = Product::findOrFail($id);
            $product->delete();
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
