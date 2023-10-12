@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="wrap" style="margin:25px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Add Other Cost</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('other.cost.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="my-5">
                            <label for="">Date</label>
                            <input name="date" class="form-control" type="date">
                        </div>
                        <div class="my-5">
                            <label for="">Amount</label>
                            <input name="amount" class="form-control" type="text">
                        </div>
                        <div class="my-5">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="my-5">
                            <label for="">Image</label>
                            <img id="img" src="" alt="">
                            <input name="image" class="form-control-file" type="file">
                        </div>
                        <div class="my-5">
                            <input class="btn btn-success" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $(document).on('change','input[name="image"]',function(e){
            e.preventDefault();
            let url = URL.createObjectURL(e.target.files[0]);
            $('#img').attr('src',url).width('200px').height('200px');
        })
    })
</script>



@endsection
