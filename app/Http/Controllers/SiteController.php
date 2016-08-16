<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Validator;

class SiteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response|static[]
     */
    public function index(Request $request)
    {
        $status = true;
        if (Auth::user()->hasRole(array(
            Config::get('constants.TIER_1_ROLE_NAME'),
            Config::get('constants.TIER_2_ROLE_NAME'),))
        ) {
            $sites = Site::all();
        } else {
//            $sites = Auth::user()->sites;
            $sites = array();
        }
        $length = count($sites);
        if ($request->ajax()) {
            if ($request->wantsJson()) {
                return response()->json(compact(['sites', 'status', 'length']));
            } else {
                return $sites;
            }
        } else {
            //TODO provide a view
            return view('', compact(['sites', 'status', 'length']));
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
     * @return Site|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* validation */
        $validator = Validator::make($request->all(), array(
            'site_url' => 'max:2083',
            'site_xpath' => 'max:255',
            'recent_price' => 'numeric',
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
            $site = Site::create($request->all());
            $status = true;
            if ($request->ajax()) {
                if ($request->wantsJson()) {
                    return response()->json(compact(['site', 'status']));
                } else {
                    return $site;
                }
            } else {
                //TODO set view or redirect path
                return redirect()->with(compact(['site', 'status']));
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
            $site = Site::findOrFail($id);
            $status = true;
            if ($request->ajax()) {
                if ($request->wantsJson()) {
                    return response()->json(compact(['site', 'status']));
                } else {
                    return $site;
                }
            } else {
                //TODO set view
                return view('')->with(compact(['site', 'status']));
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
            $site = Site::findOrFail($id);
            $status = true;
            //TODO set view
            return view('')->with(compact(['site', 'status']));
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
            'site_url' => 'max:2083',
            'site_xpath' => 'max:255',
            'recent_price' => 'numeric',
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
                $site = Site::findOrFail($id);
                $site->update($request->all());
                if ($request->ajax()) {
                    if ($request->wantsJson()) {
                        return response()->json(compact(['status', 'site']));
                    } else {
                        return $site;
                    }
                } else {
                    //TODO set view or redirect path
                    return redirect()->with(compact(['status', 'site']));
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
            $site = Site::findOrFail($id);
            $site->delete();
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
