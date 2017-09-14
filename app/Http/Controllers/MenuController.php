<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Menu;
use App\Role;
use Datatables;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $dummy = [['id' => '', 'text' => '']];

    public function index()
    {

        $parent = Menu::select('id', 'menu_en as text')
                        ->whereNull('parentid')
                        ->get()
                        ->toArray();

        $role = Role::select('id', 'name as text')
                        ->get()
                        ->toArray();

        return view('pages.menu')
                ->with('parent', array_merge($this->dummy, $parent))
                ->with('role', $role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $menu = new Menu;

        $menu->menu_en          = $request->menu_en;
        $menu->menu_id          = $request->menu_id;
        $menu->parentid         = $request->parentid;
        $menu->class            = $request->class;
        $menu->url              = $request->url;

        if (!empty($request->user_group)) {
            $menu->user_group       = implode(';', $request->user_group);
        }
        
        $menu->order_number     = $request->order_number;

        if ($menu->save())
            $res = ['title' => trans('label.success'), 'type' => 'success', 'message' => trans('label.save_success')];
        else
            $res = ['title' => trans('label.error'), 'type' => 'error', 'message' => trans('label.save_failure')];

        return response()->json($res);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Menu::find($id);
        return $data->toJSON();
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
        $menu = Menu::find($id);

        $menu->menu_en          = $request->menu_en;
        $menu->menu_id          = $request->menu_id;
        $menu->parentid         = $request->parentid;
        $menu->class            = $request->class;
        $menu->url              = $request->url;
        if (!empty($request->user_group)) {
            $menu->user_group       = implode(';', $request->user_group);
        }
        $menu->order_number     = $request->order_number;

        if ($menu->save())
            $res = ['title' => trans('label.success'), 'type' => 'success', 'message' => trans('label.update_success')];
        else
            $res = ['title' => trans('label.error'), 'type' => 'error', 'message' => trans('label.update_failure')];

        return response()->json($res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Menu::destroy($request->id);
        
        $res = ['title' => trans('label.success'), 'type' => 'success', 'message' => count($request->id).' '.trans('label.delete_success')];
        return response()->json($res);
    }

    public function getData()
    {
        $menu = Menu::select(

                        'menus.id',
                        'menus.menu_en',
                        'menus.menu_id',
                        'menus.parentid',
                        'menu_parent.menu_en as parent_en',
                        'menu_parent.menu_id as parent_id',
                        'menus.class',
                        'menus.url',
                        'menus.user_group',
                        'menus.order_number'

                    )
                    ->leftJoin('menus as menu_parent', 'menu_parent.id', '=', 'menus.parentid')
                    ->orderBy('parentid')
                    ->get();

        return Datatables::of($menu)

        ->addColumn('option', function($data){

            return '<input type="checkbox" name="check_row[]" value="'.$data->id.'">';
          
        })

        ->addColumn('menu_name', function($data){

            return (session('language') == 'id') ? $data->menu_id : $data->menu_en;

        })

        ->addColumn('parent_name', function($data){

            return (session('language') == 'id') ? $data->parent_id : $data->parent_id;

        })

        ->addColumn('class', function($data){

            return '<i class="'.$data->class.'"></i>';

        })

        ->addColumn('user_group', function($data){

            $role       = Role::whereIn('id', explode(';', $data->user_group))->get();
            $user_group = [];

            foreach ($role as $role_user) {
                $user_group[] = $role_user->name;
            }

            return implode(', ', $user_group);

        })

        //->addColumn('user_group')

        ->make(true);
    }
}
