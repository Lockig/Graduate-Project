@extends('layout.layout')

@section('content')
    <div class="container">
        <!--begin::Advance Table Widget 1-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <div class="card-title align-items-start flex-column">
                    <h3 id="current_time" class="align-self-baseline text-dark"></h3>
                    <h3>Nếu đi muộn :)</h3>
                </div>
            </div>
            <div class="card-body py-0">
                <div class="table-responsive">
                    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                        <thead>
                        <tr class="text-left">
                            <th class="pl-0" style="width: 20px">
                                STT
                            </th>
                            <th class="pr-0" style="width: 50px">Ngày</th>
                            <th style="min-width: 200px"></th>
                            <th style="min-width: 150px">Giờ vào</th>
                            <th style="min-width: 150px">Giờ ra</th>
                            <th class="pr-0 text-right" style="min-width: 150px">Ghi chú</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="pl-0">
                                <label class="">
                                    <span>1</span>
                                </label>
                            </td>
                            <td class="pr-0">
                                <div class="symbol symbol-50 symbol-light mt-1">
																<span class="symbol-label">
																	<img src="assets/media/svg/avatars/001-boy.svg"
                                                                         class="h-75 align-self-end" alt=""/>
																</span>
                                </div>
                            </td>
                            <td class="pl-0">
                                <a href="#"
                                   class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                </a>
                            </td>
                            <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                        </span>
                            </td>
                            <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                        </span>
                            </td>
                            <td class="pr-0 text-right">
                                <span class="text-danger font-weight-bolder font-size-lg">Đi muộn</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/js/pages/widgets.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            function showCurrentTime() {
                var today = new Date();
                var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                var dateTime = date+' '+time;
               document.getElementById('current_time').innerHTML = dateTime
            }

            setInterval(showCurrentTime, 1000);
        })
    </script>
@endsection
