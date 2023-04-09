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
                                    <label for="course_id" class="form-label">المادة</label>
                                    <select required name="course_id" id="teacher_id" class="form-control">
                                        <option value="">يرجى اختيار المادة</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="teacher_id" class="form-label">المعلم</label>
                                    <select required name="teacher_id" id="teacher_id" class="form-control">
                                        <option value="">يرجى اختيار معلم المادة</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="absence_tolerance" class="form-label">نسبة الغياب المسموحة لكل طالب</label>
                                    <input type="number" id="absence_tolerance" class="form-control">
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
