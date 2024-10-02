<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Awblabel"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
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
                        <div class="h5 font-weight-bold text-primary">Add New Awblabel</div>
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
                        <form id="awblabel-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="{{ route('awblabel.store') }}" method="post" >
                            @csrf
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="airline">Airline</label></th>
                                            <th class="bg-light"><label for="awbbc">Awbbc</label></th>
                                            <th class="bg-light"><label for="awb">Awb</label></th>
                                            <th class="bg-light"><label for="hawb">Hawb</label></th>
                                            <th class="bg-light"><label for="destination">Destination</label></th>
                                            <th class="bg-light"><label for="origin">Origin</label></th>
                                            <th class="bg-light"><label for="total">Total</label></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="100" class="text-right">
                                        <?php $template_id = "table-row-" . random_str(); ?>
                                        <button type="button" data-template="#<?php echo $template_id ?>" class="btn btn-sm btn-success btn-add-table-row"><i class="material-icons">add</i></button>
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <!--[table row template]-->
                                <template id="<?php echo $template_id ?>">
                                <?php $row = "CURRENTROW"; // will be replaced with current row index. ?>
                                <tr data-row="<?php echo $row ?>" class="input-row">
                                <td>
                                    <div id="ctrl-airline-row<?php echo $row; ?>-holder" class=" ">
                                    <input id="ctrl-airline-row<?php echo $row; ?>" data-field="airline"  value="<?php echo get_value('airline') ?>" type="text" placeholder="Enter Airline"  name="row[<?php echo $row ?>][airline]"  class="form-control " />
                                </div>
                            </td>
                            <td>
                                <div id="ctrl-awbbc-row<?php echo $row; ?>-holder" class=" ">
                                <input id="ctrl-awbbc-row<?php echo $row; ?>" data-field="awbbc"  value="<?php echo get_value('awbbc') ?>" type="text" placeholder="Enter Awbbc"  name="row[<?php echo $row ?>][awbbc]"  class="form-control " />
                            </div>
                        </td>
                        <td>
                            <div id="ctrl-awb-row<?php echo $row; ?>-holder" class=" ">
                            <input id="ctrl-awb-row<?php echo $row; ?>" data-field="awb"  value="<?php echo get_value('awb') ?>" type="text" placeholder="Enter Awb"  name="row[<?php echo $row ?>][awb]"  class="form-control " />
                        </div>
                    </td>
                    <td>
                        <div id="ctrl-hawb-row<?php echo $row; ?>-holder" class=" ">
                        <input id="ctrl-hawb-row<?php echo $row; ?>" data-field="hawb"  value="<?php echo get_value('hawb') ?>" type="text" placeholder="Enter Hawb"  name="row[<?php echo $row ?>][hawb]"  class="form-control " />
                    </div>
                </td>
                <td>
                    <div id="ctrl-destination-row<?php echo $row; ?>-holder" class=" ">
                    <input id="ctrl-destination-row<?php echo $row; ?>" data-field="destination"  value="<?php echo get_value('destination') ?>" type="text" placeholder="Enter Destination"  name="row[<?php echo $row ?>][destination]"  class="form-control " />
                </div>
            </td>
            <td>
                <div id="ctrl-origin-row<?php echo $row; ?>-holder" class=" ">
                <input id="ctrl-origin-row<?php echo $row; ?>" data-field="origin"  value="<?php echo get_value('origin') ?>" type="text" placeholder="Enter Origin"  name="row[<?php echo $row ?>][origin]"  class="form-control " />
            </div>
        </td>
        <td>
            <div id="ctrl-total-row<?php echo $row; ?>-holder" class=" ">
            <input id="ctrl-total-row<?php echo $row; ?>" data-field="total"  value="<?php echo get_value('total') ?>" type="number" placeholder="Enter Total" step="any"  name="row[<?php echo $row ?>][total]"  class="form-control " />
        </div>
    </td>
    <th class="text-center">
    <button type="button" class="btn-close btn-remove-table-row"></button>
    </th>
</tr>
</template>
<!--[/table row template]-->
</div>
<div class="form-ajax-status"></div>
<!--[form-button-start]-->
<div class="form-group form-submit-btn-holder text-center mt-3">
    <button class="btn btn-primary" type="submit">
    Submit
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
    
$(document).ready(function(){
	// custom javascript | jquery codes
});

</script>
@endsection
