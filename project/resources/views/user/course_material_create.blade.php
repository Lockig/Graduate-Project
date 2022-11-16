@extends('layout.layout')

@section('content')

    @include('system_message')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Tạo học liệu</h5>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Khóa học</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">{{\App\Models\Course::find($course)->course_name}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Tạo học liệu</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                </div>
                <!--end::Details-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <div class="card card-custom">
                    <form action="{{route('teacher.storeCourseMaterial',$course)}}" method="POST"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-7 mt-4 ml-2">
                                <div class="form-group">
                                    <label class="text-dark-75" for="header">Tiêu đề</label>
                                    <input type="text" name="header" class="form-control" placeholder="nhập tiêu đề"
                                           @if(isset($id))
                                               value="{{DB::table('course_materials')->where('course_id','=',$course)->where('id','=',$id)->value('header')}}"
                                        @endif
                                    >
                                </div>
                                <div class="form-group">
                                    <label class="text-dark-75" for="description">Nội dung</label>
                                    <textarea id="kt-ckeditor-3" type="text" name="description" class="form-control"
                                              placeholder="nhập nội dung">
                                           @if(isset($id))
                                            {{DB::table('course_materials')->where('course_id','=',$course)->where('id','=',$id)->value('description')}}"
                                        @endif
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-3 mt-4">
                                <div class="form-group">
                                    <label for="header">File</label>
                                    <input type="file" max="5" accept=".jpg,.jpeg,.png,.pdf,.docx" name="file_upload[]"
                                           multiple class="form-control" placeholder="nhập tiêu đề">
                                    <small>Tải lên tối đa 5 files/lần</small>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mb-2">
                            <button class="btn btn-primary btn-hover-primary align-center" type="submit">Tạo học liệu
                            </button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script src="{{asset('js/form-editor.js')}}"></script>
    <script>
        // Class definition

        var KTCkeditor = function () {
            // Private functions
            var demos = function () {
                ClassicEditor
                    .create(document.querySelector('#kt-ckeditor-3'))
                    .then(editor => {
                        console.log(editor);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

            return {
                // public functions
                init: function () {
                    demos();
                }
            };
        }();

        // Initialization
        // $(document).ready(function() {
        //     KTCkeditor.init();
        // });
    </script>

@endsection
