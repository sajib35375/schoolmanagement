@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
    <div class="my-5" style="margin: 25px;">
        <div class="row">
            <div class="col-md-12" style="display: block; margin: auto;">
                <div class="box box-solid bg-secondary">
                    <div class="box-header">
                        <h4 class="box-title"><strong>Add Student Fee</strong></h4>
                    </div>

                    <div class="box-body" >


                            <div class="row" >
                                <div class="col-md-3">
                                    <label for="">Year Name</label>
                                    <select id="year_id" class="form-control" name="year_id">
                                        <option value="">Select</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Class Name</label>
                                    <select id="class_id" class="form-control" name="class_id">
                                        <option value="">Select</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Fee Categories</label>
                                    <select id="fee_category_id" class="form-control" name="fee_category_id">
                                        <option value="">Select</option>
                                        @foreach ($fee_categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Date</label>
                                    <input name="date" id="date" class="form-control" type="date">
                                </div>

                                <div class="col-md-3" style="padding-top: 8px;">
                                    <a id="search_btn" href="#" class="btn btn-success">Search</a>
                                </div>
                            </div>



                    <div class="row d-none" id="remove">
                        <div class="col-md-12">

                    <div id="DocumentResults">


                        <script id="document-template" type="text/x-handlebars-template">
                        <form action="{{ route('account.fee.store') }}" method="POST">
                            @csrf
                        <table class="table table-bordered table-striped" style="width: 100%">
                        <thead>
                            <tr>
                            @{{{thsource}}}
                            </tr>
                            </thead>
                            <tbody>
                                @{{#each this}}
                                <tr>
                                    @{{{tdsource}}}
                                </tr>
                                @{{/each}}
                            </tbody>
                        </table>

                    <button type="submit" class="btn btn-primary" style="margin-top: 10px">Submit</button>

                    </form>
                        </script>









                        </div> 	 <!-- // End col md 12 -->
                    </div>  <!-- // END Row  -->

                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(document).on('click','#search_btn',function(){
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            var fee_category_id = $('#fee_category_id').val();
            var date = $('#date').val();
           $.ajax({
            url: "{{ route('student.fee.search')}}",
            type: "GET",
            data: {'year_id':year_id,'class_id':class_id,'fee_category_id':fee_category_id,'date':date},
            beforeSend: function() {
            },
            success: function (data) {
                $('#remove').removeClass('d-none');
              var source = $("#document-template").html();
              var template = Handlebars.compile(source);
              var html = template(data);
              $('#DocumentResults').html(html);
              $('[data-toggle="tooltip"]').tooltip();
            }
          });
        });
      </script>




@endsection
