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
                                    <label for="code" class="form-label">الكود</label>
                                    <input type="text" id="code" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="hours_per_week" class="form-label">عدد الساعات</label>
                                    <input type="number" id="hours_per_week" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-secondary">اضافة</button>
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
