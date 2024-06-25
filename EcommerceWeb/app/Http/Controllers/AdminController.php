<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;
use Notification;
use App\Notifications\EmailNotification;

class AdminController extends Controller
{
    public function category()
    {
        $data=category::all();

        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;

        // Generate a unique ID for the category
        do {
            $category_id = random_int(1, PHP_INT_MAX); // Generates a random integer within the range of valid PHP integer values
        } while (Category::find($category_id) !== null);

        $data->id = $category_id; // Assign the unique ID to the category

        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }


    public function delete_category($id)
    {
        $data=category::find($id);

        $data->delete();

        return redirect()->back()->with('message','Category Deleted');
    }

    public function view_product()
    {
        $category=category::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new Product;

        // Generate a unique ID for the product
        do {
            $product_id = random_int(1, PHP_INT_MAX); // Generates a random integer within the range of valid PHP integer values
        } while (Product::find($product_id) !== null);

        $product->id = $product_id; // Assign the unique ID to the product

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->total_discount = $request->disc_price;
        $product->category = $request->category;

        $image = $request->file('image');
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product', $imagename);
            $product->image = $imagename;
        }

        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }


    public function show_product()
    {
        $product=product::all();
        $product = product::orderBy('category')->get();

        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id)
    {
        $product=product::find($id);

        $product->delete();

        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        $order->delete();

        return redirect()->back()->with('message', 'Order deleted successfully.');
    }


    public function update_product($id)
    {
        $product=product::find($id);

        $category=category::all();

        return view('admin.update_product',compact('product','category'));
    }

    public function update_product_confirm(Request $request,$id)
    {
        $product=product::find($id);

        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->total_discount=$request->disc_price;
        $product->quantity=$request->quantity;
        $product->category=$request->category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product', $imagename);
            $product->image = $imagename;
        }

        $product->save();
        
        return redirect()->back()->with('message','Product updated successfully');
    }

    public function order()
    {
        $order=order::all();


        return view('admin.order',compact('order'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Ubah status delivery menjadi 'delivered' jika belum
        if ($order->delivery_status != 'delivered') {
            $order->delivery_status = 'delivered';
            $order->payment_status = 'paid'; // Ubah juga status payment menjadi 'paid'
            $order->save();
        }

        // Mengurangi quantity dari produk yang dipesan
        $product = Product::where('name', $order->product_name)->first();
        if ($product) {
            $product->quantity -= $order->quantity;
            $product->save();
        }

        return redirect()->back()->with('message', 'Order status updated to delivered.');
    }

    public function print($id)
    {
        $order=order::find($id);

        $pdf=PDF::loadView('admin.pdf',compact('order'));

        return $pdf->download('order_details.pdf');
    }

    public function email($id)
    {
        $order=order::find($id);

        return view('admin.email',compact('order'));
    }

    public function send_user_email(Request $request,$id)
    {

        $order=order::find($id);

        $details=[

            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,

        ];

        notification::send($order,new EmailNotification($details));

        return redirect()->back();

    }

    public function searchdata(Request $request)
    {

        $searchText=$request->search;

        $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone_number','LIKE',"%$searchText%")->orWhere('product_name','LIKE',"%$searchText%")->get();

        return view ('admin.order',compact('order'));

    }

    public function sortOrders()
    {
        // Custom sorting logic
        $order = Order::orderByRaw("
            CASE
                WHEN delivery_status = 'processing' THEN 1
                WHEN delivery_status = 'cancelled' THEN 2
                ELSE 3
            END, name ASC")->get();

        return view('admin.order', compact('order'));
    }


    public function sortByName()
    {
        $order = Order::orderBy('name')->get();

        return view('admin.order', compact('order'));
    }

    public function filterByDeliveryStatus(Request $request)
{
    // Validasi request
    $request->validate([
        'delivery_status' => 'nullable|in:processing,delivered', // Nullable karena bisa kosong untuk menampilkan semua
    ]);

    // Ambil nilai dari form filter
    $deliveryStatus = $request->input('delivery_status');

    // Query untuk mengambil pesanan berdasarkan status pengiriman yang dipilih atau semua pesanan jika tidak ada filter
    $query = Order::query();

    if ($deliveryStatus) {
        $query->where('delivery_status', $deliveryStatus);
    }

    // Ambil data pesanan
    $order = $query->get();

    // Load view kembali dengan data pesanan yang sudah difilter
    return view('admin.order', compact('order'));
}

    

}
