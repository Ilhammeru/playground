<?php

namespace App\Http\Controllers;

use App\Models\Playground;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaygroundController extends Controller
{
    public function store() {
        $data = [
            'name'      => 'Ilham',
            'email'     => 'gumilang@gmail.com',
            'address'   => 'Jalan kramat jati'
        ];

        DB::beginTransaction();

        try {
            $id = Playground::insertGetId($data);

            $playground = Playground::find($id);

            $playground->relation()->sync(['11', '15', '20']);

            DB::commit();

            return response()->json([
                'data' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'data' => $th->getMessage()
            ]);
        }
    }
}
