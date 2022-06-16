<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Product;
use DataTables;

class ProductController extends Controller
{
    private $productItem;

    public function __construct(Product $productItem) {
        //Get the contents from JSON file
        // $productJson = file_get_contents('products.json');
        // $product = json_decode($productJson);
        $this->productItem = $productItem;
    }
    public function show() {
        // $bookItem = [];
        // $cdItem = [];
        //differentiate between book product and Cd product after running a loop
        // foreach($this->productItem as $product) {
        //     if ($product->type == 'book') {
        //         $bookItem[] = $product;
        //     }
        //     else {
        //         $cdItem[] = $product;
        //     }
        // }
        // $products = $this->productItem->latest()->paginate(20);

        return view('product'); 
    }

    public function productList(Request $request){
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function($row){
                        $image = '<img src="'.$row->image.'" width="150px" height="200px"/>';
                        return $image;
                    })
                    ->addColumn('action', function($data){
                        return view('product-actions', compact('data'));
                    })->rawColumns(['action', 'image'])
                    ->make(true);
        }
      
        return view('products');
    }

    public function create(){
        return view('add-product');
    }

    public function store(Request $request) {

        // $ids = [];
        // foreach ($this->productItem as $product) {
        //      $ids[] = $product->id;
        // }
        // rsort($ids);
        // $newItemID = $ids[0] + 1;
        // $products = [];
        // foreach ($this->productItem as $product) {
        //     $products[] = $product;
        // }
        // $addProduct = [];
        // $addProduct['id'] = $newItemID;
        // $addProduct['type'] = $request->producttype;
        // $addProduct['title'] = $request->title;
        // $addProduct['firstname'] =$request->fname;
        // $addProduct['mainname'] = $request->sname;
        // $addProduct['price'] = $request->price;
        // if( $request->producttype=='cd') $addProduct['playlength'] = $request->pages;
        // if( $request->producttype=='book') $addProduct['numpages'] = $request->pages;
        // $products[] = $addProduct;
        // $json = json_encode($products);
        // file_put_contents("products.json", $json);

        $this->validate($request, [
            'title'=>'string|required',
            'first_name'=>'string|required',
            'main_name'=>'string|required',
            'type'=>'string|in:CD,BOOK',
            'image'=>'required|mimes:jpg,png|max:10000',
            'price'=>'required|numeric',
            'playlength'=>'required|numeric',
        ]);

        $data = $request->all();

        if($data['image']){

            $path = '/product';

            $file = $data['image'];
            
            $imageName =  $file->getClientOriginalName();
            
            $fileName = asset($path). '/' . date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
            
            $file->move(public_path(). $path, $fileName);
            
            $filePublicPath = str_replace(asset($path). '/', '', public_path() . $path . '' . $fileName);

            $data['image'] = $fileName;

        }

        $this->productItem->create($data);

        request()->session()->flash('success','Product Successfully added!');
        
        return redirect()->route('product.show');

        // return response()->json(['msg' => "success"]);
    }
    public function view($id) {
        // $getProductById = Arr::where($this->productItem, function($value) use($id) {
        //     return($value->id == $id);
        // });
        // $getProduct = array_values($getProductById)[0];
        $product = $this->productItem->find($id);
        return view("edit-product", compact("product"));
    }

    public function update(Request $request, $id) {
        // $products = [];
        // foreach ($this->productItem as $product) {
        //     if($product->id != $id) {
        //         $products[] = $product;
        //     }
        //     else {
        //         $product->title = $request->title;
        //         $product->firstname =$request->fname;
        //         $product->mainname = $request->sname;
        //         $product->price = $request->price;
        //         if( $request->producttype=='cd') $product->playlength = $request->pages;
        //         if( $request->producttype=='book') $product->numpages = $request->pages;
        //         $products[] = $product;
        //     }
        // }
        // $json = json_encode($products);
        // file_put_contents("products.json", $json);
        $this->validate($request, [
            'title'=>'string|required',
            'first_name'=>'string|required',
            'main_name'=>'string|required',
            'type'=>'string|in:CD,BOOK',
            'price'=>'required|numeric',
            'playlength'=>'required|numeric',
        ]);
        
        $product = $this->productItem->find($id);

        $data = $request->all();

        if(isset($data['image'])){

            $path = '/product';

            $file = $data['image'];
            
            $imageName =  $file->getClientOriginalName();
            
            $fileName = asset($path). '/' . date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
            
            $file->move(public_path(). $path, $fileName);
            
            $filePublicPath = str_replace(asset($path). '/', '', public_path() . $path . '' . $fileName);

            $data['image'] = $fileName;

        }

        $product->update($data);

        request()->session()->flash('success','Product Successfully updated!');
        
        return redirect()->route('product.show');
    }
    public function destroy($id) {
        // dd('here');
        // $products = [];
        // foreach ($this->productItem as $product) {
        //     if($product->id != $id) {
        //         $products[] = $product;
        //     }
        // }
        // $json = json_encode($products);
        // file_put_contents("products.json", $json);
        
        $getProduct = $this->productItem->find($id);
        
        $getProduct->delete();

        request()->session()->flash('success','Product Successfully deleted!');
        
        return redirect()->route('product.show');
        // return response()->json(['msg' => "success"]);
    }

    public function productDetail($id){
        $product = $this->productItem->find($id);
        $type = $product->type;
        $relatedProducts = Product::where('id', '!=', $product->id)->where('type', $type)->take(4)->get();
        return view('frontend.detail-product', compact('product', 'relatedProducts'));
    }

    public function buynow($id){
        $product = $this->productItem->find($id);
        return view('buy-now', compact('product'));
    }
}
