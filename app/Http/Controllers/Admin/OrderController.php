<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // ВЫВОД ОТПРАВЛЕННЫХ ЗАЯВОК
    public function index()
    {
        $orders = DB::select('SHOW COLUMNS FROM `orders` LIKE "status"')[0]->Type;
        preg_match('/^enum\((.*)\)$/', $orders, $matches);
        $status = array();
        foreach( explode(',', $matches[1]) as $value )
        {
            $v = trim( $value, "'" );
            array_push($status, $v);
        }
        $orders = Order::orderBy('id','DESC')->get();
        return view('admin.orders.index',compact('orders','status'));
    }

    public function order($id){
        $user = auth()->user();
        $order = Order::where('id','=',$id)->first();
        $products = $order->products;
        return view('admin/orders/order',compact('order','products'));
    }

    public function check($IdOrder){
        $order = Order::find($IdOrder);
        $order->status = 'Taken';
        $success = $order->update();
        if($success){
            session()->flash('success','Заказ был обработан!');
        }
        return redirect()->route('adminMain');
    }

    public function change($IdOrder,Request $request){
        $order = Order::find($IdOrder);
        $order->status = $request->status;
        $success = $order->update();
        if($success){
            session()->flash('success','Информация о заказе была обновлена!');
        }
        return redirect()->route('adminMain');
    }
    //УДАЛЕНИЕ ЗАКАЗА
    public function delete($IdOrder)
    {
        $order = Order::find($IdOrder);
        foreach ($order->products()->get() as $product){
            $product->in_stock = $product->in_stock + $product->pivot->count;
            $product->update();
        }
        $order->delete();
        session()->flash('success','Заказ был удален!');
        return redirect()->route('adminMain');
    }
}
