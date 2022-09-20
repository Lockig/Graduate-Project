@if(Session::has('Success'))
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="alert alert-success">{{Session::get('Success')}}</span>
    </div>
@endif
@if(Session::has('Fail'))
    <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="alert alert-danger">{{Session::get('Fail')}}</span>
    </div>
@endif
@if(Session::has('Warning'))
    <div class="alert alert-warning alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="alert alert-warning">{{Session::get('Warning')}}</span>
    </div>
@endif
@if(Session::has('Danger'))
    <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="alert alert-danger">{{Session::get('danger')}}</span>
    </div>
@endif

{{-- Error Message --}}
@if ($errors->any())
    <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        @foreach ($errors->all() as $error)
            <span class="font-weight-semibold">{!! $error !!}</span><br>
        @endforeach
    </div>
@endif

