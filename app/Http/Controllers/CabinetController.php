<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CabinetChangePasswordRequest;
use Illuminate\Support\Facades\Hash;

class CabinetController extends Controller
{

    /*
     * Страница для вывода избранных книг
     * */
    public function favorites()
    {
        $user = auth()->user();
        if ($user) {
            $products = $user->products()->where('status', '=', 'Favorites')->get();
        } else {
            session()->flash('warning', 'Вы не авторизовались!');
            return redirect()->route('home');
        }
        return view('cabinet/favorites', compact('products'));
    }

    public function index()
    {
        $user = auth()->user();
        return view('cabinet/index', compact('user'));
    }

    public function form()
    {
        $user = auth()->user();
        return view('cabinet/form', compact('user'));
    }

    public function changeInformation(Request $request)
    {
        $valideted = validator($request->all(),[
            'name' => ['required'],
            'email' => ['required','string','email','unique:users']
        ])->validate();

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $success = $user->update();
        if ($success) {
            session()->flash('success', 'Данные успешно изменены!');
            return redirect()->route('cabinet.index');
        } else {
            session()->flash('warning', 'Что-то пошло не так!');
            return redirect()->back();
        }
    }

    public function indexPassword()
    {
        return view('cabinet/changePassword');
    }

    public function changePassword(Request $request)
    {
        $validated = validator($request->all(), [
            'old_password' => ['required','min:8','max:30','password'],
            'new_password' => ['required','min:8','max:30','confirmed'],
            'new_password_confirmation' => ['required','min:8','max:30'],
        ])->validate();

        $user = auth()->user();

        $user->password = Hash::make($request->new_password);
        $user->update();
        session()->flash('success','Пароль успешно изменен!');
        return redirect()->route('cabinet.index');

    }

    public function ordersIndex(){
        $user = auth()->user();
        $orders = Order::where('user_id','=',$user->id)->orderBy('id','DESC')->get();

        return view('cabinet/orders',compact('orders'));
    }

    public function order($id){
        $user = auth()->user();
        $order = Order::where('id','=',$id)->first();
        $products = $order->products;
        return view('cabinet/order',compact('order','products'));
    }
}
