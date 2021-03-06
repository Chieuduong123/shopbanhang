<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping cart | Dream Shop</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
</head>

<body>
    @include('header')


    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr data-id="">
                                    <th>Ảnh</th>
                                    <th style=" width: 200px;">Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá tiền</th>
                                    <th>Xóa</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                <tr>
                                    <td>
                                        <div class="product__cart__item__pic"><img src="{{ asset('img/'.$cart->img) }}" width="150px" height="150px" class="img-responsive" /></div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <h6>{{$cart->name}}
                                            </h6>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="">
                                                <input style="width: 70px; text-align: center;" type="number" min="1" value="{{$cart->quantity}}" class="form-control quantity update-cart">
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th=" Price" class="cart__price">{{$cart->price}}
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.destroy',$cart->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{route('shop')}}" class="btn btn-warning">tiếp tục</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="{{route('cart')}}"><i class="fa fa-spinner"></i> Cập nhật</a>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Mã giảm giá</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Áp dụng</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Tổng thanh toán</h6>
                       
                        <ul>

                            <li>Tổng giá<span> {{$totalAll}} vnđ </span> </li>
                            <li> Phí vận chuyển<span>{{$transport_fee}} vnđ </span> </li>
                            <li>Khuyến mãi <span>{{$discount}} vnđ </span>  </li>
                            <li>Tổng <span>{{$all_total}} vnđ </span> </li>
                      
                        </ul>
                        <a href="{{route('checkout')}}" class="primary-btn">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    @include('footer')

    <!-- Js Plugins -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src=" {{asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/mixitup.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>