<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\CommentLike;
use Session;
use Stripe;

class HomeController extends Controller
{

    public function index()
    {
        $product = Product::paginate(6);
        $comment = comment::orderBy('created_at', 'desc')->get();
        $reply = reply::all();
        return view('home.userpage', compact('product', 'comment', 'reply'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $total_product = product::all()->count();

            $total_order = order::all()->count();

            $total_user = user::all()->count();

            $order = order::all();

            $total_revenue = 0;

            foreach ($order as $order) {
                $total_revenue += (float) str_replace('.', '', $order->price);
            }

            $total_revenue = number_format($total_revenue, 0, ',', '.');

            $total_delivered = order::where('delivery_status', '=', 'delivered')->get()->count();

            $total_processing = order::where('delivery_status', '=', 'processing')->get()->count();

            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));
        } else {
            $product = Product::paginate(6);

            $comment = comment::orderBy('created_at', 'desc')->get();

            $reply = reply::all();

            return view('home.userpage', compact('product', 'comment', 'reply'));
        }
    }

    public function product_details($id)
    {
        $product = product::find($id);

        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();

            $product = product::find($id);

            $cart = new cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone_number = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_name = $product->name;

            $price = (float) str_replace('.', '', $product->total_discount ?? $product->price);
            $quantity = (int) $request->quantity;
            $cart->price = $price * $quantity;
            $cart->price = number_format($cart->price, 0, ',', '.');

            $cart->image = $product->image;
            $cart->product_id = $product->id;

            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;

            $cart = Cart::where('user_id', $id)->get();

            return view('home.showcart', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart = cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();

        $userid = $user->id;

        $data = cart::where('user_id', '=', $userid)->get();

        foreach ($data as $data) {
            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone_number = $data->phone_number;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_name = $data->product_name;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'COD/Transfer';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with('message', 'We Received Your Order. We Going to Contact you ASAP');
    }

    public function stripe($totalprice)
    {


        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $totalprice * 100,
            "currency" => "idr",
            "source" => $request->stripeToken,
            "description" => "Thank for payment"
        ]);


        $user = Auth::user();

        $userid = $user->id;

        $data = cart::where('user_id', '=', $userid)->get();

        foreach ($data as $data) {
            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone_number = $data->phone_number;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_name = $data->product_name;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Paid using card';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        Session::flash('success', 'Payment successful!');

        return back();
    }

    public function show_order()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;

            $order = Order::where('user_id', '=', $userid)
                ->orderByRaw("CASE 
                            WHEN delivery_status = 'processing' THEN 1 
                            WHEN delivery_status = 'delivered' THEN 2 
                            ELSE 3 
                        END")
                ->get();

            return view('home.order', compact('order'));
        } else {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order = order::find($id);

        $order->delivery_status = 'you canceled the order';

        $order->save();

        return redirect()->back();
    }

    public function delete_order($id)
    {
        $order = Order::find($id);

        if ($order) {
            if ($order->delivery_status == 'delivered' || $order->delivery_status == 'you canceled the order') {
                $order->delete();
                return redirect()->back()->with('message', 'Order deleted successfully.');
            } else {
                return redirect()->back()->with('message', 'Cannot delete order with current status.');
            }
        }

        return redirect()->back()->with('message', 'Order Deleted Successfully.');
    }

    public function add_comment(Request $request)
    {
        if (Auth::id()) {
            $user_id = Auth::user()->id;
            $name = Auth::user()->name;
            $comment_text = $request->comment;

            // Generate a unique comment ID
            do {
                $comment_id = random_int(1, PHP_INT_MAX); // Generates a random integer within the range of valid PHP integer values
            } while (Comment::find($comment_id) !== null);

            // Create a new comment instance
            $comment = new Comment;
            $comment->id = $comment_id;
            $comment->name = $name;
            $comment->user_id = $user_id;
            $comment->comment = $comment_text;

            // Save the comment
            $comment->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }


    public function add_reply(Request $request)
    {
        if (Auth::id()) {
            $reply = new reply;

            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;

            $reply->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function likeComment(Request $request)
    {
        $commentId = $request->commentId;
        $userId = Auth::id();

        // Cek apakah pengguna sudah menyukai komentar ini
        $existingLike = CommentLike::where('user_id', $userId)->where('comment_id', $commentId)->first();

        if ($existingLike) {
            return response()->json(['success' => false, 'message' => 'You have already liked this comment.']);
        }

        // Tambah entri like baru di tabel comment_likes
        CommentLike::create([
            'user_id' => $userId,
            'comment_id' => $commentId,
        ]);

        // Tambah jumlah like di tabel comments
        $comment = Comment::find($commentId);
        if ($comment) {
            $comment->likes += 1;
            $comment->save();
            return response()->json(['success' => true, 'likes' => $comment->likes]);
        }

        return response()->json(['success' => false]);
    }


    public function deleteComment(Request $request)
    {
        $comment = Comment::find($request->commentId);
        if ($comment && $comment->user_id == Auth::id()) {
            $comment->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 403);
    }

    public function search_product(Request $request)
    {
        $comment = comment::orderby('id', 'desc')->get();
        $reply = reply::all();

        $search = $request->search;

        $product = product::where('name', 'LIKE', "%$search%")->orWhere('category', 'LIKE', "$search")->paginate(6);

        return view('home.userpage', compact('product', 'comment', 'reply'));
    }
}
