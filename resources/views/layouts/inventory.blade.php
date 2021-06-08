@extends('layouts.adminTemplate')

@section('content')

<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Inventory
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Sub Nav-->
                    <a class="btn btn-primary mx-1" href="{{route('product.index')}}">Products</a>
                    <a class="btn btn-primary mx-1" href="{{route('category.index')}}">Categories</a>
                    <a class="btn btn-primary mx-1" href="{{route('supplier.index')}}">Suppliers</a>
                <!--end::Sub Nav--></h1>
            <!--end::Title--> 
        </div>
    </div>
    <!--end::container-->
</div>
<!--end::toolbar-->

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-xxl-4">
                <!--begin::List Widget 5-->
                <div class="card card-xxl-stretch">
                    @yield('sub_content')
                </div>
            </div><!--end::col-->
        </div><!--end::row-->
    </div>
    <!--end::container-->
</div>
<!--end::post-->
@endsection