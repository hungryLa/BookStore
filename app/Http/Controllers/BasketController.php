<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use MongoDB\Driver\Session;
use function session, is_null, view;

class BasketController extends Controller
{
    /**
     * Функция для подгрузки страницы корзины
     * Из сессии берем id заказа , после проверяем существует ли такой номер
     * При положительном результате пытаемся найти заказ по id
     * Получаем информцию о заказе и подгружаем страницу
     */
    public function basket()
    {
        $orderId = session('orderId');
        $order = null;
        if (!is_null($orderId)) {
            /**
             * @noinspection  PhpUndefinedMethodInspection
             * @var Order $order Заказ
             */
            $order = Order::findOrFail($orderId);
        }
        return view('basket', ['order' => $order]);
    }

    /**
     * Переход на страницу оформления заказа
     * Проверяем id заказа в сессии, если NULL возвращаем на главную страницу
     * Если нашли, то передаем данные на страницу "order"
    */
    public function basketOrder()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('home');
        }
        $order = Order::find($orderId);
        return view('order', ['order' => $order]);
    }

    /**
     * Внесение заказа в БД
     * Проверяем id заказа в сессии, если NULL возвращаем на главную страницу
     * Если нашли, то передаем данные на страницу "order"
     */
    public function basketConfirm(Request $request)
    {
        $orderId = session('orderId');
        $order = Order::find($orderId);
        // Уменьшаем кол-во книг в наличии
        foreach($order->products()->get() as $product){
            $product->in_stock = $product->in_stock - $product->pivot->count;
            $product->update();
        }
        $success = $order->saveOrder($request->name,$request->phone);

        if ($success) {
            session()->flash('success', 'Ваш заказ принят в обработку');
        } else {
            session()->flash('warning', 'Что-то пошло не так');
        }

        return redirect()->route('home');
    }

    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        return redirect()->back();
    }

    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        $order = Order::find($orderId);
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        return redirect()->route('basket');
    }
}
