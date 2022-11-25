@extends('layout.layout')


@section('content')
    @include('system_message')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Bảng lương giáo viên</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.listTeacher')}}" class="text-muted">Danh sách giáo viên</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Bảng lương giáo viên</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <div class="card card-custom gutter-b">
                    <div class="card-header d-flex justify-content-center">
                        <h3 class="card-title text-uppercase">Danh sách lương chờ duyệt</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('admin.updateSalary')}}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Duyệt tất cả</button>
                            <table class="table table-head-custom table-vertical-center"
                                   id="kt_advance_table_widget_1">
                                <thead>
                                <tr class="text-left">
                                    <th class="pl-0" style="width: 20px">#</th>
                                    <th class="pl-0" style="width: 20px">STT</th>
                                    <th class="pr-0" style="width: 80px">Mã GV</th>
                                    <th class="pr-0" style="width: 100px">Tên GV</th>
                                    <th class="pr-0" style="width: 100px">Mã lớp</th>
                                    <th class="pr-0" style="width: 100px">Tên lớp</th>
                                    <th class="pr-0" style="width: 100px">Buổi</th>
                                    <th class="pr-0" style="width: 100px">Tiền lương</th>
                                    <th class="pr-0" style="width: 100px">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($uncheck_attendances as $data)
                                    <tr>
                                        <td class="pr-0">
                                            <label class="checkbox">
                                                <input type="checkbox" name="check[]" value="{{$data->id}}"/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td class="pr-0">{{$loop->index +1 }}</td>
                                        <td class="pr-0">
                                            <a href="#"
                                               class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data->teacher_id}}</a>
                                        </td>
                                        <td class="pr-0">
                                            <a href="#"
                                               class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{ucwords($data->first_name).' '.ucwords($data->last_name)}}</a>
                                        </td>
                                        <td class="pr-0">
                                            <a href="#"
                                               class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data->course_id}}</a>
                                        </td>
                                        <td class="pr-0 text-left">
                                            <a href="#"
                                               class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data->course_name}}</a>
                                        </td>
                                        <td class="pr-0 text-left">
                                            <a href="#"
                                               class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\Carbon\Carbon::parse($data->time_in)->format('d-m-Y')}}</a>
                                        </td>
                                        <td class="pr-0 text-right">
                                            <a href="#"
                                               class="text-success font-weight-bold text-hover-primary mb-1 font-size-lg">{{number_format(($data->money - \Illuminate\Support\Facades\DB::table('penalties')->where('penalty_id','=',$data->penalty_id)->value('penalty_amount')),0)}}</a>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                                 data-toggle="tooltip"
                                                 title="từ chối">
                                                <button type="submit" name="decline" value="{{$data->id}}"
                                                        class="svg-icon svg-icon-md svg-icon-primary btn btn-icon btn-light btn-hover-primary btn-sm">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                         version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path
                                                                d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                fill="#000000" fill-rule="nonzero"/>
                                                            <path
                                                                d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                fill="#000000" opacity="0.3"/>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </button>
                                            </div>
                                            <div class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                                 data-toggle="tooltip"
                                                 title="duyệt">
                                                <button type="submit" name="accept" value="{{$data->id}}"
                                                        class="svg-icon svg-icon-md svg-icon-primary btn btn-icon btn-light btn-hover-primary btn-sm">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                         version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path
                                                                d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                fill="#000000" fill-rule="nonzero"/>
                                                            <path
                                                                d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                fill="#000000" opacity="0.3"/>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    Không có dữ liệu
                                @endforelse
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="card card-custom gutter-b">
                    <div class="card-header d-flex justify-content-center">
                        <h3 class="card-title text-uppercase">Thống kê lương</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.getSalary')}}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-5 input-group">
                                    <label class="mt-3 mr-2">Chọn:</label>
                                    <input class="form-control form-control-solid" type="month" name="month"/>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                        <table class="table table-head-custom table-vertical-center"
                               id="kt_advance_table_widget_1">
                            <thead>
                            <tr class="text-left">
                                <th class="pl-0" style="width: 20px">STT</th>
                                <th class="pr-0" style="width: 80px">Mã GV</th>
                                <th class="pr-0" style="width: 100px">Tên GV</th>
                                <th class="pr-0" style="width: 100px">Tổng số buổi</th>
                                <th class="pr-0" style="width: 100px">Tiền lương</th>
                                <th class="pr-0" style="width: 100px">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($test as $data)
                                <tr>
                                    <td class="pr-0">{{$loop->index +1 }}</td>
                                    <td class="pr-0">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data[0]->user_id}}</a>
                                    </td>
                                    <td class="pr-0">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{ucwords($data[0]->first_name).' '.ucwords($data[0]->last_name)}}</a>
                                    </td>
                                    <td class="pr-0">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{ count($data) }}</a>
                                    </td>
                                    <td class="pr-0 text-left text-success font-weight-bold">
                                        {{ number_format(collect($data)->sum('money') - collect($data)->sum('penalty_amount'),0) }}
                                    </td>

                                    <td class="text-right">
                                        <button type="button"
                                                data-toggle="modal"
                                                data-target="#detailIncome"
                                                title="chi tiết"
                                                class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                        <span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24"
                                                                                 version="1.1">
                                                                                <g stroke="none" stroke-width="1"
                                                                                   fill="none"
                                                                                   fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24"
                                                                                          height="24"/>
                                                                                    <path
                                                                                        d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                        fill="#000000"/>
                                                                                    <path
                                                                                        d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                        fill="#000000" opacity="0.3"/>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span>
                                        </button>
                                        <!-- Modal-->
                                        <div class="modal fade" id="detailIncome" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form
                                                    action="#"
                                                    method="post">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Chi tiết tiền
                                                                lương</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <i aria-hidden="true" class="ki ki-close"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body d-flex flex-column">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr class="text-left">
                                                                    <th class="pl-0">#</th>
                                                                    <th>Lớp</th>
                                                                    <th>Buổi</th>
                                                                    <th>Tiền học</th>
                                                                    <th>Đi muộn</th>
                                                                    <th>Thành tiền</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @forelse($data as $item)
                                                                    <tr>
                                                                        <td><span>{{$loop->index+1}}</span></td>
                                                                        <td><span>{{$item->course_name}}</span></td>
                                                                        <td>
                                                                            <span>{{\Carbon\Carbon::parse($item->time_in)->format('d-m-Y')}}</span>
                                                                        </td>
                                                                        <td><span class="text-success">{{number_format($item->money,0)}}</span></td>
                                                                        <td>
                                                                            <span class="text-danger">{{number_format(\Illuminate\Support\Facades\DB::table('penalties')->where('penalties.penalty_id','=',$item->penalty_id)->value('penalty_amount'),0)}}</span>
                                                                        </td>
                                                                        <td>
                                                                            <span class="text-success">{{number_format($item->money - \Illuminate\Support\Facades\DB::table('penalties')->where('penalties.penalty_id','=',$item->penalty_id)->value('penalty_amount'),0)}}</span>
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    không có dữ liệu
                                                                @endforelse
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                    class="btn btn-light-primary font-weight-bold"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                            <button type="submit"
                                                                    class="btn btn-primary font-weight-bold">Lưu
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                             data-toggle="tooltip"
                                             title="xuất pdf">
                                            <form action="{{route('admin.exportSalary',$item->user_id)}}" method="post">
                                                @method('post')
                                                @csrf
                                                <input type="hidden" name="data" value="{{json_encode($data)}}">
                                            <button type="submit" name="export"
                                                    class="svg-icon svg-icon-md svg-icon-primary btn btn-icon btn-light btn-hover-primary btn-sm">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                     version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                       fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path
                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                            fill="#000000" fill-rule="nonzero"/>
                                                        <path
                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                            fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                Không có dữ liệu
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')


@endsection
