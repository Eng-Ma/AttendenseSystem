@extends('layout')
@section('title', $title)
@section('pageTitle', $pageTitle)
@section('styles')
    <!-- Responsive Table css -->
    <link href="/assets/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-wrapper">
                                <div class="btn-toolbar">
                                    <div class="btn-group focus-btn-group">
                                        <a href="{{route('courses.create')}}" type="button" class="btn btn-default mb-3"><span
                                                class="glyphicon glyphicon-screenshot"></span> اضافة مادة
                                        </a>
                                    </div>
                                </div>
                                <div class="table-rep-plugin fixed-solution" data-pattern="priority-columns">
                                    <div class="table-responsive" data-pattern="priority-columns">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>الاسم</th>
                                                <th>الكود</th>
                                                <th>ساعات الدراسة</th>
                                                <th>اعدادات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>GOOGGoogle Inc.</th>
                                                <th>A103</th>
                                                <th>3</th>
                                                <th>
                                                    <a class="btn btn-default btn-sm" href="{{route('courses.edit', 1)}}">تعديل</a>
                                                    <a class="btn btn-default btn-sm" href="">حذف</a>
                                                    <a class="btn btn-default btn-sm" href="">تفاصيل</a>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>GOOGGoogle Inc.</th>
                                                <th>A103</th>
                                                <th>3</th>
                                                <th>
                                                    <a class="btn btn-default btn-sm" href="{{route('courses.edit', 1)}}">تعديل</a>
                                                    <a class="btn btn-default btn-sm" href="">حذف</a>
                                                    <a class="btn btn-default btn-sm" href="">تفاصيل</a>
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end .table-responsive -->

                                </div>
                            </div>
                        </div> <!-- end .table-rep-plugin-->
                    </div> <!-- end .responsive-table-plugin-->
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
@section('scripts')
@endsection
