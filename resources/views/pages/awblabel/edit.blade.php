<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Edit Awblabel"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="edit" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto  back-btn-col" >
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="material-icons">arrow_back</i>                                
                    </a>
                </div>
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Edit Awblabel</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-9 comp-grid " >
                    <div  class="card card-1 border rounded page-content" >
                        <!--[form-start]-->
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("awblabel/edit/$rec_id"); ?>" method="post">
                        <!--[form-content-start]-->
                        @csrf
                        <div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="airline">Airline </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-airline-holder" class=" ">
                                            <input id="ctrl-airline" data-field="airline"  value="<?php  echo $data['airline']; ?>" type="text" placeholder="Enter Airline"  name="airline"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="awbbc">Awbbc </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-awbbc-holder" class=" ">
                                            <input id="ctrl-awbbc" data-field="awbbc"  value="<?php  echo $data['awbbc']; ?>" type="text" placeholder="Enter Awbbc"  name="awbbc"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="awb">Awb </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-awb-holder" class=" ">
                                            <input id="ctrl-awb" data-field="awb"  value="<?php  echo $data['awb']; ?>" type="text" placeholder="Enter Awb"  name="awb"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="hawb">Hawb </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-hawb-holder" class=" ">
                                            <input id="ctrl-hawb" data-field="hawb"  value="<?php  echo $data['hawb']; ?>" type="text" placeholder="Enter Hawb"  name="hawb"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="destination">Destination </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-destination-holder" class=" ">
                                            <input id="ctrl-destination" data-field="destination"  value="<?php  echo $data['destination']; ?>" type="text" placeholder="Enter Destination"  name="destination"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="origin">Origin </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-origin-holder" class=" ">
                                            <input id="ctrl-origin" data-field="origin"  value="<?php  echo $data['origin']; ?>" type="text" placeholder="Enter Origin"  name="origin"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="total">Total </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-total-holder" class=" ">
                                            <input id="ctrl-total" data-field="total"  value="<?php  echo $data['total']; ?>" type="number" placeholder="Enter Total" step="any"  name="total"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-ajax-status"></div>
                        <!--[form-content-end]-->
                        <!--[form-button-start]-->
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">
                            Update
                            <i class="material-icons">send</i>
                            </button>
                        </div>
                        <!--[form-button-end]-->
                    </form>
                    <!--[form-end]-->
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
<!-- Page custom css -->
@section('pagecss')
<style>

</style>
@endsection
<!-- Page custom js -->
@section('pagejs')
<script>
    <!--pageautofill-->
$(document).ready(function(){
	// custom javascript | jquery codes
});

</script>
@endsection
