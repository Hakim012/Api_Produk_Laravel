<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'harga' => 'required',
            ]);

            $produk = Produk::create([
                'name' => $request->name,
                'harga' => $request->harga,
            ]);

            $data = Produk::where('id', '=', $produk->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error){
            return ApiFormatter::createApi(400, 'Failed');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Produk::where('id', '=', $id)->get();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
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
        try {
            $request->validate([
                'name' => 'required',
                'harga' => 'required',
            ]);

            $produk = Produk::findOrFail($id);

            $produk->update([
                'name' => $request->name,
                'harga' => $request->harga,
            ]);

            $data = Produk::where('id', '=', $produk->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error){
            return ApiFormatter::createApi(400, 'Failed');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $produk = Produk::findOrFail($id);

            $data = $produk->delete();

                if($data){
                    return ApiFormatter::createApi(200, 'Success Destroy Data');
                } else {
                    return ApiFormatter::createApi(400, 'Failed');
                }
        } catch (Exception $error){
            return ApiFormatter::createApi(400, 'Failed');

        }
    }
}
