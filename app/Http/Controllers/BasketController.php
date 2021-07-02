<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }
        return view('basket', ['order' => $order]);
    }

    public function basketPlace(){
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('home');
        }
        $order = Order::find($orderId);
        return view('order',['order' => $order]);
    }

    public function basketConfirm(Request $request){
        $orderId = session('orderId');
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name,$request->phone);

        if($success){
            session()->flash('success','Ваш заказ принят в обработку');
        }else{
            session()->flash('warning','Что-то пошло не так');
        }
        return redirect()->route('home');
    }

    public function basketAdd($bookId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        //dd($order->books());
        if ($order->books->contains($bookId)) {
            $pivotRow = $order->books()->where('book_id',$bookId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->books()->attach($bookId);
        }

        if(Auth::check()){
            $order->user_id = Auth::id();
            $order->save();
        }

        return redirect()->route('basket');
        //return view('basket',['order'=>$order]);
    }

    public function basketRemove($bookId)
    {
        $orderId = session('orderId');
        $order = Order::find($orderId);
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }

        if ($order->books->contains($bookId)) {
            $pivotRow = $order->books()->where('book_id',$bookId)->first()->pivot;
            if($pivotRow->count < 2){
                $order->books()->detach($bookId);
            }else{
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        return redirect()->route('basket');
    }
}
