<?php namespace App\Http\Controllers\Api\v1;
use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ArticleController extends Controller
{
    public function articles(){
        $articles=Article::select('title','user_id','description')->latest()->get();
        return response(['data'=>['articles'=>$articles],'status'=>200],200);

    }

    public function comments(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'comment' => 'required'
        ]);
        //nemishe az payini estefade kard shayad be khatere ink az http session estefade mikone(96.12.19:()
//        $validator = $request->validate([
//            'name' => 'required',
//            'comment' => 'required'
//        ]);
//        $errors = $validator->errors();



        if ($validator->fails())
            return response(['data'=>$validator->errors()->all(),'status'=>401],401);
        else
            return response(['data' => [$request->name,$request->comment] , 'status' => 200] , 200);
    }
}