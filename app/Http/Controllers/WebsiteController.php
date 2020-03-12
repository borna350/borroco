<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Validator;
use App\Models\Faq;
use App\Models\Team;
use App\Models\About;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Models\FollowUs;
use App\Models\Wishlist;
use App\Models\HomeVideo;
use App\Models\FooterInfo;
use App\Models\HomeBanner;
use App\Models\Subcategory;
use App\Models\Coupon;
use App\Models\OrderDetails;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\User;
use Hash;

class WebsiteController extends Controller
{
    public function index(){
        $data = FooterInfo::first();
        $homeBanner = HomeBanner::first();
        $homeVideos = HomeVideo::where('status', 'active')->orderBy('id', 'desc')->get();

        return view('website.index', compact('homeBanner', 'homeVideos', 'follow','data'));
    }

    public function categoryShop($slug){
        $data = Category::where('slug', $slug)->with('homeSubcategories')->first();
        return view('website.category_shop', compact('data'));
    }

    public function subcategoryShop($catSlug, $subCateSlug){
        $data = Subcategory::where('slug', $subCateSlug)->first();
        $thisCategory = Category::where('slug', $catSlug)->first();

        $userId = (Auth::user())?Auth::user()->id:'';
        $sql = Product::where('subcategory_id', $data->id);
        if ($userId) {
            $sql->select('products.*', 'wishlists.id AS wId');
            $sql->leftJoin('wishlists', function($q) use ($userId) {
                $q->on('products.id', '=', 'wishlists.product_id')
                ->where('wishlists.user_id', '=', $userId);
            });
        } else {
            $sql->select('products.*');
        }
        $products = $sql->paginate(12);
        return view('website.products', compact('data', 'thisCategory', 'products'));
    }

    public function productDetails($catSlug, $proSlug){
        $data = Product::where('slug', $proSlug)->first();
        $thisCategory = Category::where('slug', $catSlug)->first();
        $thisSubCategory = Subcategory::where('id', $data->subcategory_id)->first();
        $relatedProducts = Product::where('craftsman_id', $data->craftsman_id)->orderBy('id','desc')->take(5)->get();
       // return $relatedProducts;
        return view('website.product_detail', compact('data', 'thisCategory', 'thisSubCategory','relatedProducts'));
    }

    public function addToCart(Request $request, $slug){
        $product = Product::where('slug', $slug)->first();
        Cart::add([
            'id' =>     $product->id,
            'name' =>   $product->name,
            'price' =>  $product->price,
            'qty' => 1,
            'weight' => '0',
            'options' => [
                'image' => $product->thum_image_1,
                'description' => $product->description,
                'product_color' => isset($request->color) ? $request->color:'',
                'product_size' => isset($request->size) ? $request->size:'',
            ]
        ]);
        //Cart::tax($product->tax);
        

         return  redirect()->back()->with('success', 'Product add to cart!');
    }

    public function removeCart($cartId){
        Cart::remove($cartId);
        return redirect()->back();
    }
    public function destroyCart(){
        Cart::destroy();
        return redirect()->back();
    }
    public function updateCart(Request $request){
        $rid = $request->row_id;
        $qty = $request->qty;
        for($i = 0; $i< count($rid); $i++){
            Cart::update($rid[$i], $qty[$i]);
        }
        return redirect()->back();
    }
    public function applyCoupon(Request $request){
        // return $request;
        $data = $request->all();
        // $rid = $request->row_id;
        $coupon = Coupon::where('code', $request->coupon_code)
            ->where('user_id', auth()->user()->id)
            ->where('status', 'active')
            ->first();

        if ($coupon) {
            # code...
            // $price = 1000-$coupon->discount_price;

            return $price;
        }else{
            return 'Data not found';
        } 
        
        return  redirect()->back();
      
    }

    public function shopWoman(){

        return view('website.woman');
    }

    public function shopMan(){

        return view('website.man');
    }

    public function shopProduct(){

        return view('website.products');
    }

    public function shopProductDetail(){

        return view('website.productDetail');
    }

    public function shopArtisans(){
        $data = Admin::where('role', 'craftsman' )
        ->where('status', 'active')
        ->with('artisanProduct')
        ->orderBy('id', 'desc')
        ->get();

        return view('website.artisans', compact('data'));
    }

    public function shopArtisansSingle($slug){
        $data = Admin::where('slug', $slug )
        ->first();
        $products = Product::where('craftsman_id', $data->id )
        ->orderBy('id', 'desc')
        ->paginate(12);
        return view('website.artisans-single', compact('data','products'));
    }

    public function shopCart(){

        return view('website.cart');
    }

    public function shopWish(){

        return view('website.wishList');
    }

    public function checkout(){
        $billingAddress = BillingAddress::where('user_id', Auth::user()->id)->first();
        $shippingAddress = ShippingAddress::where('user_id', Auth::user()->id)->first();

        return view('website.checkout', compact('billingAddress', 'shippingAddress'));
    }

    public function placeOrder(){
        return  redirect()->back();
    }

    public function storeWishList($slug){
        $thisProduct = Product::where('slug', $slug)->first();
        $status = Wishlist::where('user_id', Auth::user()->id)
        ->where('product_id', $thisProduct->id)
        ->first();

        if(isset($status->user_id) && isset($status->product_id)) {
            return redirect()->back()->with('success', 'This item is already in your Wishlist!');

        } else {
            $wishlist = new Wishlist();
            $wishlist->product_id = $thisProduct->id;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->save();

            return redirect()->back()->with('success', 'Item, '. $thisProduct->title.' Added to your wishlist.');
        }

        //exit;
    }
    public function wishListDestroy($id)
    {
        $data = Wishlist::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Wish list deleted');
    }

    public function shopAbout(){
        $about = About::first();

        $team = Team::where('status', 'active')->orderBy('id', 'asc')->get();
        return view('website.about', compact('about', 'follow', 'team'));
    }

    /*******LOGIN********/
    public function loginPage(){

        return view('website.login', compact('follow'));
    }
    public function resetPage(){
        return view('website.reset-pass');
    }
    public function customerSupport(){

        return view('website.customer-support');
    }
    /*********LOGIN******/

    /*******LEGAL********/
    public function privacyPolicy(){
        return view('website.legal.privacy-policy');
    }
    public function workWithUs(){
        return view('website.legal.work-with-us');
    }
    public function termsAndConditoin(){
        return view('website.legal.terms-condition');
    }
    public function faqs(){
        $faq = Faq::where('status', 'active')->orderBy('id', 'desc')->get();
        return view('website.legal.faq', compact('faq'));
    }
    /*********LEGAL******/

    /********USER ACCOUNT********/
    public function user_accounts(){
        $user = User::get();
        return view('website.user-account.dashboard', compact('user'));
    }
    public function user_order(){
        $orders = Order::get();
        return view('website.user-account.order', compact('orders'));
    }
    public function user_order_view($id){
        // $orderDetails = OrderDetails::first();
        $orders = Order::find($id);
        $orderDetails = OrderDetails::where('order_id', $id)->get();
        $payment = Payment::where('order_id', $id)->orderBy('id', 'desc')->first();
        $user = User::where('id', Auth::user()->id)->first();
        $billingAddress = BillingAddress::where('user_id', Auth::user()->id)->first();
        $shippingAddress = ShippingAddress::where('user_id', Auth::user()->id)->first();
        return view('website.user-account.order-view', compact('orders', 'payment', 'billingAddress', 'shippingAddress', 'user', 'orderDetails'));
    }
    public function user_address(){
        $billingAddress = BillingAddress::where('user_id', Auth::user()->id)->first();
        $shippingAddress = ShippingAddress::where('user_id', Auth::user()->id)->first();
        return view('website.user-account.address', compact('billingAddress', 'shippingAddress'));
    }
    public function user_details(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('website.user-account.accountsDetails', compact('user'));
    }
    public function user_billing(){
        $data = BillingAddress::where('user_id', Auth::user()->id)->first();
        return view('website.user-account.billingAddress', compact('data'));
    }
    public function user_shipping(){
        $data = ShippingAddress::where('user_id', Auth::user()->id)->first();
        return view('website.user-account.shippingAddress', compact('data'));
    }
    /********USRE ACCOUNT********/

    public function artisanRegister(){
        return view('website.artisan_signup');
    }

    public function artisanRequest(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:191|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data['password'] = bcrypt($request->password);
        $data['status'] = 'active';
        Admin::create($data);
        return  redirect()->back()->with('success', "Your request has been processed  and waiting for admin verification. Thank You!");
    }


    public function userUpdate(Request $request, $id){
        $data = $request->all();

        $user = User::find($id);

        if($request->current_password){
    
            if (password_verify($request->current_password, $user->password)) {
            
                $validator = Validator::make($data, [
                    'first_name' => 'required|max:255',
                    'last_name' => 'sometimes|max:255',
                    'email' => 'required|max:191|unique:users,email,' . $id,
                    'password' => 'required|string|min:8|confirmed',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
                User::find($id)->update($data);
            } else {
                return  redirect()->back()->with('error', 'Password is valid!');
            }

        }else{
            $validator = Validator::make($data, [
                'first_name' => 'required|max:255',
                'last_name' => 'sometimes|max:255',
                'email' => 'required|max:191|unique:users,email,' . $id,
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            User::find($id)->update($data);
        }

        return  redirect()->back()->with('success', 'User account update successfully!');
    }



}
