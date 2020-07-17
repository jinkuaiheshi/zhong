@extends('admin_sys_header')

@section('content')
    <div class="site-content">


        <div class="box box-block bg-white">
            <div class="form-group" style="height: auto; overflow: hidden;">
            </div>
            <table class="table table-striped table-bordered dataTable" id="tab" >
                <thead>
                <tr>
                    <th>标题</th>
                    <th>作者</th>
                    <th>来源</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($article as $v)
                    <tr>
                        <td>{{$v->title}}</td>
                        <td>{{$v->publisher}}</td>
                        <td>{{$v->source}}</td>
                        <td>{{$v->created_time}}</td>
                        <td>
                            <a href="{{url('admin/sys/article/'.$v->id)}}" ><button type="button" class="btn btn-purple w-min-xs  waves-effect waves-light"   >编辑文章</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>

    @if(Session::has('message'))
        <div id="toast-container" class="toast-top-right" aria-live="polite" role="alert"><div class="toast
@if(Session::get('type')=='danger')
                    toast-error
@elseif(Session::get('type')=='success')
                    toast-success
@endif " style="display: block;"><div class="toast-message">{{Session::get('message')}}</div></div></div>
    @endif







    <script>
        $('#tab').DataTable( {
            dom: 'Bfrtip',
            iDisplayLength: 15,
            bStateSave:false,
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5'

            ]
        } );
    </script>

@stop