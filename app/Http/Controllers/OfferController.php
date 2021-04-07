<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Offer;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Mail\Events\MessageSent;

class OfferController extends Controller
{
    public function create($post_id, Request $request)
    {

        $post = Post::where('id', $post_id)->first();
        $data = $request->validate([
            'message' => ['required'],
            'price' => ['required']
        ]);

        $message = new Message();
        $message->recipient = $post->user_id;
        $message->sender = auth()->user()->id;
        $message->content = $data['message'];
        $message->post_id = $post_id;

        $message->save();

        $message_id = $message->id;

        $offer = new Offer();

        $offer->user_id = auth()->user()->id;
        $offer->post_id = $post_id;
        $offer->message_id = $message_id;
        $offer->price = $data['price'];

        $offer->save();

        return redirect()->route('post.show', $post->id);
    }

    public function index($post_id)
    {
        $offers = Offer::where('post_id', $post_id)->get();
        return view('offer.index', [
            'offers' => $offers,
        ]);
    }

    public function detail($offer_id)
    {
        $offer = Offer::where('id', $offer_id)->first();

        $messages = Message::where([
            'post_id' => $offer->post_id,
            'sender' => $offer->user_id
        ])->get();


        return view('offer.detail', [
            'offer' => $offer,
            'messages' => $messages
        ]);
    }
}
