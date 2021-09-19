<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Picqer;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::paginate(5);
        return view('product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$product=Product::create($request->all());
        $productCode=$request->product_code;
         $product=new Product;
         if($request->hasFile('product_image'))
            {
            $file=$request->file('product_image');
            $file->move(public_path().'/products/images',$file->getClientOriginalName());
            $product_image=$file->getClientOriginalName();
            $product->product_image=$product_image;
            }
            $redcolor='255,0,0';

            $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
            file_put_contents('products/barcodes/'.$productCode.'.jpg',
            $generator->getBarcode($productCode, $generator::TYPE_CODE_128,3,50));

       
        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->brand=$request->brand;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->product_code=$productCode;
        $product->barcode=$productCode .'.jpg';
        $product->alert_stock=$request->alert_stock;
        $product->save();
        return redirect()->back()->with('Success','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$product)
    {
        /*$product->update($request->all());
        return redirect()->back()->with('Success','Product updated successfully');*/
        $productCode=$request->product_code;
         $product=Product::find($product);
         if($request->hasFile('product_image'))
            {
                if($product->product_image !=''){
                    $product_path=public_path() . '/products/images/' .$product->product_image;
                    unlink($product_path);
                }
            $file=$request->file('product_image');
            $file->move(public_path().'/products/images',$file->getClientOriginalName());
            $product_image=$file->getClientOriginalName();
            $product->product_image=$product_image;
            }
            if($request->product_code != '' && $request->product_code != $product->product_code ){
                $unique=Product::where('product_code',$productCode)->first();
                if($unique){
                    return redirect()->back()->with('error','Something wrong');
                }
                if($product->barcode !=''){
                    $barcode_path=public_path().'/products/barcodes/'.$product->barcode;
                    unlink($barcode_path);
                }
            $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
            file_put_contents('products/barcodes/'.$productCode.'.jpg',
            $generator->getBarcode($productCode, $generator::TYPE_CODE_128,3,50));
            $product->barcode=$productCode.'.jpg';
        }
        //$product=new Product;
        //$product=Product::find($product); 
        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->brand=$request->brand;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->product_code=$productCode;
        $product->alert_stock=$request->alert_stock;
        $product->save();
        return redirect()->back()->with('Success','Product created successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('Success','Product Deleted successfully');
    }
    public function getProductbarcode()
    {
        //$product=Product::all();
        $barcode=Product::select(['barcode','product_code'])->get();
        //dd($barcode);
       // dd($barcode);
        return view('product.barcode.index',[
            'barcode'=>$barcode
        ]);
    }
}
