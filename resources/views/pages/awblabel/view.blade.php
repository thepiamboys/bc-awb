<!--
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Air WayBill Detail"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page ajax-page" data-page-type="view" data-page-url="{{ url()->full() }}">
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
                        <div class="h5 font-weight-bold text-primary">Awblabel Details</div>
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
                <div class="col comp-grid " >
                    <div  class=" page-content" >
                        <?php
                            require '../vendor/autoload.php';
                            $generator = new Picqer\Barcode\BarcodeGeneratorHtml();
                            if($data){
                            $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                        ?>
                        <div id="page-main-content" class=" px-3 mb-3">
                            <div class="ajax-page-load-indicator" style="display:none">
                                <div class="text-center d-flex justify-content-center load-indicator">
                                    <span class="loader mr-3"></span>
                                    <span class="fw-bold">Loading...</span>
                                </div>
                            </div>
                            <div class="page-data">
                                <!--PageComponentStart-->
                                <div class="mb-3 row row justify-content-start g-0">
                                    <div class="col-12">
                                        <div class="bg-success mb-1 p-2 card-1 rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Id</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['id'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bg-success mb-1 p-2 card-1 rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Airline</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['airline'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bg-success mb-1 p-2 card-1 rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Awbbc</small>
                                                    <div class="fw-bold">
                                                        <?php
                                                            echo $generator->getBarcode($data['awbbc'], $generator::TYPE_CODE_128);
                                                            echo  $data['awbbc'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bg-success mb-1 p-2 card-1 rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Awb</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['awb'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bg-success mb-1 p-2 card-1 rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Hawb</small>
                                                    <div class="fw-bold">
                                                        <?php
                                                            echo $generator->getBarcode($data['hawb'], $generator::TYPE_CODE_128);
                                                            echo  $data['hawb'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bg-success mb-1 p-2 card-1 rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Destination</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['destination'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bg-success mb-1 p-2 card-1 rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Origin</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['origin'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bg-success mb-1 p-2 card-1 rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">Total</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['total'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--PageComponentEnd-->
                                <div class="d-flex align-items-center gap-2">
                                    <div class="dropup export-btn-holder">
                                        <button  class="btn  btn-sm btn-outline-primary dropdown-toggle" title="Export" type="button" data-bs-toggle="dropdown">
                                        <i class="material-icons">save</i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <?php Html :: export_menus(['pdf', 'print']); ?>
                                        </div>
                                    </div>
                                    <a class="btn btn-sm btn-success has-tooltip "   title="Edit" href="<?php print_link("awblabel/edit/$rec_id"); ?>" >
                                    <i class="material-icons">edit</i> Edit
                                </a>
                                <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" title="Delete" href="<?php print_link("awblabel/delete/$rec_id?redirect=awblabel"); ?>" >
                                <i class="material-icons">delete_sweep</i> Delete
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    else{
                ?>
                <!-- Empty Record Message -->
                <div class="text-muted p-3">
                    <i class="material-icons">block</i> No Record Found
                </div>
                <?php
                    }
                ?>
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
