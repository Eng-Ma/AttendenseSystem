@extends('layout')
@section('title', $title)
@section('pageTitle', $pageTitle)
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">الاسم</label>
                                    <input type="text" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">البريد الالكتروني</label>
                                    <input type="email" id="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">رقم الهاتف</label>
                                    <input type="number" id="mobile" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">تاريخ الميلاد</label>
                                    <input type="date" id="dob" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="profile" class="form-label">الصورة الشخصية</label>
                                    <input type="file" id="profile" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-secondary">حفظ</button>
                            </div>
                        </div> <!-- end col -->
                    </form>
                </div>
                <!-- end row-->

            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
    </div>
@endsection
@section('scripts')
@endsection
