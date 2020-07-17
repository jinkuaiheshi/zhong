@extends('admin_sys_header')

@section('content')
    <div class="site-content">
        <div class="box box-block bg-white">
            <div class="row">
                <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/articleAdd')}}">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="form-group h-a" style="text-align: center">
                            <div class="col-md-3" style="text-align: right">
                                <label for="order" class=" col-form-label " >文章标题：</label>
                            </div>
                            <div class="col-md-6">
                                <div   class="form-group">
                                    <input type="text" placeholder="文章标题" class="form-control" name="title" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group h-a" style="text-align: center">
                            <div class="col-md-3" style="text-align: right">
                                <label for="order" class=" col-form-label " >文章来源：</label>
                            </div>
                            <div class="col-md-3">
                                <div   class="form-group">
                                    <input type="text" placeholder="文章来源" class="form-control" name="source" value="">

                                </div>
                            </div>


                        </div>

                        <div class="form-group h-a" style="text-align: center">
                            <div class="col-md-3" style="text-align: right">
                                <label for="order" class=" col-form-label " >发布人：</label>
                            </div>
                            <div class="col-md-3">
                                <div   class="form-group">
                                    <input type="text" placeholder="发布人" class="form-control" name="publisher" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group h-a" style="text-align: center">
                            <div class="col-md-3" style="text-align: right">
                                <label for="order" class=" col-form-label " >选择栏目：</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control " name = 'cid' required id="cid" >
                                    <option value="0">请选择</option>
                                    @foreach ($column as $v)
                                        <option value="{{$v->id}}" style="text-align: center;"
                                        >{{$v->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group h-a" style="text-align: center;height: 600px;" >
                            <div class="col-md-3" style="text-align: right">
                                <label for="order" class=" col-form-label " >文章内容：</label>
                            </div>
                            <div class="col-md-6">
                                <div   class="form-group" style="height: 600px;">


                                    <textarea id="summernote" style="height: 600px;" name="body"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </div>
                </form>
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
            $(function () {
                $('#summernote').summernote();

            })
        </script>

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