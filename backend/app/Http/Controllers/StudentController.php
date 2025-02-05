<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;


class StudentController extends Controller
{
    public function getAll (Request $request) {
        $students=DB::table('students')->get();
        return response()->json([
            'sucess'=> true,
            'message' => 'Obtengo todos los alumnos desde el controller',
            'data'=>$students
        ]);
    }

    public  function show (Request $request,$id){
        $student=DB::table('students')->where('id',$id)->get();
        return response()->json([
            'sucess'=> true,
            'message' => "Obtengo un estudiante concreto desde el controller con id: " . $id,
            'data'=>$student
        ]);
    }
    
    public function create(StudentRequest $request) {
        $id = DB::table('students')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'password' => $request->password,
            'sex' => $request->sex,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Alumno creado exitosamente',
            'data' => [
                'id' => $id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'age' => $request->age,
                'sex' => $request->sex
            ]
        ], 201);
    }
    

    public function delete(Request $request, $id) {
        $student=DB::table('students')->where('id',$id);
        DB::table('students')->where('id',$id)->delete();
       
        return response()->json(
            ['message' => 'Borro el alumno con id ' . $id . ' desde el controller']
        );
    }
    public function update(Request $request, $id) {
        $student = DB::table('students')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'password' => $request->password,
            'sex' => $request->sex,
            'updated_at' => now()
        ]);
    
        return response()->json([
            'success' => true,
            'message' => "Actualizo un estudiante desde el controller con id: $id",
            'data' => [
                'id' => $id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'age' => $request->age,
                'sex' => $request->sex
            ]
        ]);
    }
    
}

