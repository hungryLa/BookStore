<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // ВЫВОД ОТПРАВЛЕННЫХ ЗАЯВОК
    public function index()
    {
        $orders = Order::where('status',1)->orderBy('id','ASC')->get();
        return view('admin.orders.index',compact('orders'));
    }

    public function check($IdOrder){
        $order = Order::find($IdOrder);
        $order->status = 2;
        $success = $order->save();
        if($success){
            session()->flash('success','Заказ был обработан!');
        }
        return redirect()->route('adminMain');
    }

    //УДАЛЕНИЕ ЗАКАЗА
    public function delete($IdOrder)
    {
        $order = Order::find($IdOrder);
        $order->delete();
        session()->flash('success','Заказ был удален!');
        return redirect()->route('adminMain');
    }
}
