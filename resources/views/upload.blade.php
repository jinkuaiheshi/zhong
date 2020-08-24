@extends('upload_header')

@section('content')

    <div class="content">
        <div class="box box-block bg-white">

            <p class="font-90 text-muted m-b-3"></p>

            <div class="row">
                <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('upload')}}">
                    {{ csrf_field() }}


                    <div class="form-group h-a" style="text-align: center">

                        <div class="col-md-3">
                            <div class="dropify-message">
                                <span class="file-icon"></span>
                            </div>
                            <div class="dropify-loader"></div>
                            <div class="dropify-errors-container"><ul></ul></div>
                            <input type="file" id="input-file-now" class="dropify" name="pic">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="javascript:history.back(-1);">取消</button>
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('.dropify').dropify();

        });
    </script>
    @stop