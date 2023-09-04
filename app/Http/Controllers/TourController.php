<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Destination;
use App\Models\Comment;
use Mail;
use App\Mail\ContactUsMail;
use App\Http\Requests\ContactRequest;
use Validator;

class TourController extends Controller
{
    public function showView($viewName)
    {
        $models = [
            'home' => Home::where('status', 1)->first(),
            'about' => About::all(),
            'gallery' => Gallery::all(),
            'destination' => Destination::all(),
        ];

        $background = $models['home'] ?? null;
        $content = $models[$viewName] ?? null;

        return view($viewName, compact('background', 'content'));
    }

    public function about()
    {
        return $this->showView('about');
    }

    public function blog()
    {
        return $this->showView('blog');
    }

    public function contact()
    {
         return $this->showView('contact');
    }

    public function destination()
    {
        return $this->showView('destination');
    }

    public function gallery()
    {
        return $this->showView('gallery');
    }

    public function home()
    {
        return $this->showView('home');
    }



    public function showDestination($id)
    {
        $content = Destination::findOrFail($id);
        return view('others.showDestination', compact('content'));
    }


    public function likeDestination($id)
    {
        $content = Destination::find($id);

        if($content->is_liked == 1)
        {
            $content->decrement('like', 1);
            $content->update(['is_liked' => 0]);
            return response()->json(['likeCount' => $content->like, 'is_liked' => 'Like']);
        }

        $content->increment('like', 1);
        $content->update(['is_liked' => 1]);
        return response()->json(['likeCount' => $content->like, 'is_liked' => 'Unliked']);
    }


    public function addDistinationComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Comment::create([
            'comment' => $request->comment,
            'destination_id' => $request->id
        ]);
        return response()->json('success');
    }



    public function displayDestinationComments($id)
    {
        $comments = Destination::whereid($id)
                    ->with('comment')
                    ->get();

        return response()->json($comments);
    }


    public function sendEmail(ContactRequest $request)
    {
        $mailData = [
            'fullname' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to(env('MAIL_USERNAME'))->send(new ContactUsMail($mailData));
        return redirect()->back()->with('success', 'Message Sent Successfully');
    }








}
