<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function CreateTask(Request $request)
    {
        $req = json_decode($request->body);
        $todo = new Todo();
        $todo->title = $req->title;
        $todo->desc = $req->desc;
        $todo->datestart = $req->datestart;
        $todo->dateend = $req->dateend;
        $todo->dateupdate = $req->dateupdate;
        $todo->priority = $req->priority;
        $todo->status = $req->status;
        $todo->employeeid = $req->employeeid;
        $todo->creatorid = $req->creatorid;
        return $todo->save();
    }

    public function EditTask(Request $request)
    {
        $req = json_decode($request->body);
        DB::table('todos')
            ->where('id', '=', $req->id)
            ->update([
                'title' => $req->title,
                'desc' => $req->desc,
                'datestart' => $req->datestart,
                'dateend' => $req->dateend,
                'dateupdate' => $req->dateupdate,
                'priority' => $req->priority,
                'employeeid' => $req->employeeid,
            ]);
        //return response()->json($req->id);
    }

    public function UpTaskStatus(Request $request)
    {
        $id = json_decode($request->body);
        $status = DB::table('todos')
            ->select('status')
            ->where('id', '=', $id)
            ->sum('status');

        $status++;
        DB::table('todos')
            ->where('id', '=', $id)
            ->update(['status' => $status, 'dateupdate' => date('Y-m-d H:i:s')]);
        return response()->json($id);
    }

    public function GetTodos(Request $request)
    {
        $id = $request->id;
        $todos = DB::table('todos')
            ->select('*')
            ->where('creatorid', '=', (integer)$id)
            ->orWhere('employeeid', '=', (integer)$id);
        return response()->json($todos->get());
    }
}
