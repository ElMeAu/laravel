<?php

namespace App\Http\Controllers;


use Illuminate\View\View;


use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class ActivityController extends Controller
{
    public function list(Request $request): View
    {

        $results = Activity::all();
        //var_dump($results);

        return view('activities', [
            'data' => $results,
        ]);
    }



    public function update(Request $request): View
    {
        return view('post', []);
    }

    public function save(Request $request): RedirectResponse
    {
        $activity = Activity::create([
        'title' => $request->input('title'),
        'post' => $request->input('post'),
        'user_id' => $request->user()->id,
        ]);

        //var_dump($request->file('image')->getClientOriginalName());
        //die();

        if($request->has('image')) {
            $media = $activity->addMedia($request->file('image'))
            ->toMediaCollection();

            //var_dump($media->id); die();

            $activity->image = $media->id;
        }
        

        $activity->save();
        return Redirect::route('activities');
    }


    
    
    public function profile(Request $request, $id=false): View
    {
        $user_id = $request->user()->id;

        if($id){
            $user_id = $id;

        }

        $results = Activity::all()->where('user_id', $user_id);

        //$test = User::find($user_id)->posts;
        //var_dump($test);



        return view('dashboard', [
            'data' => $results,
        ]);
    }
    public function delete(Request $request, $post_id): RedirectResponse
    {
        if(empty($post_id)){
            return false;
        }

       $post = Activity::find($post_id);

       if($post && $request->user()->id == $post->user_id) {
            Activity::destroy($post_id);
            

       }
       return Redirect::route('dashboard');

    }

    public function update_post(Request $request, $post_id): View|RedirectResponse {
 

       // Activity::where('id',$post_id )->update(['title' => 'New Title', 'post'=> 'New Post']);
        //return var_dump('Malacis');
        if(empty($post_id)){
            return false;
        }

        $post = Activity::find($post_id);

        if(
            $request->user()->id == $post->user_id &&
            $request->input('title') != null &&
            $request->input('post') != null
        ) {
            $post->title = $request->input('title');
            $post->post = $request->input('post');
            $post->save();

            return Redirect::route('dashboard');

        }

        return view('update_post', [
            'data' => $post,
        ]);


        
    }

    
}
