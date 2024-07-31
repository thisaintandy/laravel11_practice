@extends('layouts.guest')

@section('title', 'Product List')

@section('content')
      
                        @if (Route::has('login'))

                                @auth
                                    <a href="{{ url('product') }}"
                                    style="font-size:30px">
                                        Go to Dashboard
                                    </a>
                                @else
                                    <div style="margin-top:10%;">
                                        <div style="background-color: black; color:white; width: 500px;height: 300px; border-radius: 20px; text-decoration: none; text-align:center; padding:10px; margin-bottom:50px;margin-left:37%;">
                                            <a href="{{ url('products') }}" style="font-size:20px; text-decoration: none; font-family: Impact, Charcoal, sans-serif; font-size:100px">
                                                Tindahan ni Kohi
                                            </a>
                                        </div>
                                        <div style="background-color: black; color:white; width: 200px; border-radius: 20px; text-decoration: none; text-align:center; padding:10px; margin-bottom:10px; margin-left:45%;">
                                            <a href="{{ route('login') }}" style="font-size:20px; text-decoration: none; font-family: Impact, Charcoal, sans-serif;">
                                                Log in
                                            </a>
                                        </div>
                                        @if (Route::has('register'))
                                        <div style="background-color: black; color:white; width: 200px; border-radius: 20px; text-align:center; padding:10px; margin-bottom:10px; margin-left:45%;">
                                            <a href="{{ route('register') }}" style="font-size:20px;  text-decoration: none; font-family: Impact, Charcoal, sans-serif;">
                                                Register
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                @endauth
                        @endif