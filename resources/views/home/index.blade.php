@extends('layouts.front')
@section('content')
<style>
    .myHover:hover{
        opacity: 1 !important;
    }
</style>
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background: url({{asset('assets/dist/images/images.jfif')}}); background-size:cover; ">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                </svg>
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>من نحن</h1>
                        <p class="opacity-75">نحن شركة world commerce للتجارة العامة, نقدم لكن افضل المنتجات بجميع انواعها, شعارنا-جودة عالمية, ثقة دائمة </p>
                        <p><a class="btn btn-lg btn-primary" href="#"> تواصل معنا</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background: url({{asset('assets/dist/images/i.webp')}}); background-size:cover; ">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                </svg>
                <div class="container">
                    <div class="carousel-caption">
                        <h1>العنوان..</h1>
                        <p>فلسطين - قطاع غزة - النصيرات الشارع العام - شمال دوار النصيرات الكبير</p>
                        <p><a class="btn btn-lg btn-primary" href="#">الخريطة</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev myHover" type="button" data-bs-target="#myCarousel" data-bs-slide="prev" style="opacity: 0.2;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">السابق</span>
        </button>
        <button class="carousel-control-next myHover" type="button" data-bs-target="#myCarousel" data-bs-slide="next" style="opacity: 0.7;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">التالي</span>
        </button>
    </div>


    <!-- Marketing messaging and featurettes
              ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="py-4">
            <form action="" method="POST">
                @csrf
                <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between;">
                    <select name="category" id="category" class="form-control" style="width: 94%;">
                        <option value="*"> كل الاصناف *</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}" {{ request('category') == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="عرض" class="btn btn-info" style="width: 5%">
                </div>
            </form>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                        preserveAspectRatio="xMidYMid slice" focusable="false" style="background: url({{asset('assets/dist/images/kl.jfif')}}); background-size:cover;">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <h2 class="fw-normal">{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <p ><a class="btn btn-secondary" href="#" style="background-color: #52ef52; color:#333;">عرض التفاصيل</a></p>
                </div><!-- /.col-lg-4 -->
            @endforeach

        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->
@endsection
