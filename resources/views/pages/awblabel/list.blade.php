<!--
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Awblabel"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page ajax-page" data-page-type="list" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center gap-3">
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">LABEL AWB</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("awblabel/add", true) ?>" >
                    <i class="material-icons">add</i>
                    Add New Awblabel
                </a>
            </div>
            <div class="col-md-3  " >
                <!-- Page drop down search component -->
                <form  class="search" action="{{ url()->current() }}" method="get">
                    <input type="hidden" name="page" value="1" />
                    <div class="input-group">
                        <input value="<?php echo get_value('search'); ?>" class="form-control page-search" type="text" name="search"  placeholder="Search" />
                        <button class="btn btn-primary"><i class="material-icons">search</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<div  class="" >
    <div class="container-fluid">
        <div class="row ">
            <div class="col comp-grid " >
                <div  class=" page-content" >
                    <div id="awblabel-list-records">
                        <div id="page-main-content" class="table-responsive">
                            <div class="ajax-page-load-indicator" style="display:none">
                                <div class="text-center d-flex justify-content-center load-indicator">
                                    <span class="loader mr-3"></span>
                                    <span class="fw-bold">Loading...</span>
                                </div>
                            </div>
                            <?php Html::page_bread_crumb("/awblabel/", $field_name, $field_value); ?>
                            <?php Html::display_page_errors($errors); ?>
                            <div class="filter-tags mb-2">
                                <?php Html::filter_tag('search', __('Search')); ?>
                            </div>
                            <table class="table table-hover table-striped table-dark table-sm text-left">
                                <thead class="table-header bg-primary text-primary">
                                    <tr>
                                        <th class="td-checkbox">
                                        <label class="form-check-label">
                                        <input class="toggle-check-all form-check-input" type="checkbox" />
                                        </label>
                                        </th>
                                        <th class="td-id" > Id</th>
                                        <th class="td-airline" > AIRLINE</th>
                                        <th class="td-awbbc" > Air WayBill  Barcode</th>
                                        <th class="td-awb" > AIR WAYBILL NUMBER</th>
                                        <th class="td-hawb" > HAWB NUMBER</th>
                                        <th class="td-origin" > ORIGIN STATION</th>
                                        <th class="td-destination" > DESTINATION</th>
                                        <th class="td-total" > TOTAL NO OF PIECES</th>
                                        <th class="td-btn"></th>
                                    </tr>
                                </thead>
                                <?php
                                    if($total_records)
                                    {
                                ?>
                                <tbody class="page-data">
                                    <!--record-->
                                    <?php
                                    require '../vendor/autoload.php';
                                    $generator = new Picqer\Barcode\BarcodeGeneratorHtml();
                                        $counter = 0;
                                        foreach($records as $data){
                                        $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                                        $counter++;
                                    ?>
                                    <tr>
                                        <td class=" td-checkbox">
                                            <label class="form-check-label">
                                            <input class="optioncheck form-check-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                            </label>
                                        </td>
                                        <!--PageComponentStart-->
                                        <td class="td-id">
                                            <a href="<?php print_link("/awblabel/view/$data[id]") ?>"><?php echo $data['id']; ?></a>
                                        </td>
                                        <td class="td-airline">
                                            <?php echo  $data['airline'] ; ?>
                                        </td>
                                        <td class="td-awbbc">
                                            <?php
                                                echo $generator->getBarcode($data['awbbc'], $generator::TYPE_CODE_128);
                                                echo  $data['awbbc'] ;
                                                ?>

                                        </td>
                                        <td class="td-awb">
                                            <?php echo  $data['awb'] ; ?>
                                        </td>
                                        <td class="td-hawb"><strong>
                                            <?php
                                                echo $generator->getBarcode($data['hawb'], $generator::TYPE_CODE_128);
                                                echo $data['hawb']; ?></strong></td>
                                        <td class="td-origin">
                                            <?php echo  $data['origin'] ; ?>
                                        </td>
                                        <td class="td-destination">
                                            <?php echo  $data['destination'] ; ?>
                                        </td>
                                        <td class="td-total">
                                            <?php echo  $data['total'] ; ?>
                                        </td>
                                        <!--PageComponentEnd-->
                                        <td class="td-btn">
                                            <a class="btn btn-sm btn-primary has-tooltip "    href="<?php print_link("awblabel/view/$rec_id"); ?>" >
                                            <i class="material-icons">visibility</i> View
                                        </a>
                                        <a class="btn btn-sm btn-success has-tooltip "    href="<?php print_link("awblabel/edit/$rec_id"); ?>" >
                                        <i class="material-icons">edit</i> Edit
                                    </a>
                                    <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal"  href="<?php print_link("awblabel/delete/$rec_id"); ?>" >
                                    <i class="material-icons">delete_sweep</i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                        <!--endrecord-->
                    </tbody>
                    <tbody class="search-data"></tbody>
                    <?php
                        }
                        else{
                    ?>
                    <tbody class="page-data">
                        <tr>
                            <td class="bg-light text-center text-muted animated bounce p-3" colspan="1000">
                                <i class="material-icons">block</i> No record found
                            </td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <?php
                if($show_footer){
            ?>
            <div class=" mt-3">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-auto d-flex">
                        <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("awblabel/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                        <i class="material-icons">delete_sweep</i> Delete Selected
                        </button>
                        <div class="dropup export-btn-holder">
                            <button  class="btn  btn-sm btn-outline-primary dropdown-toggle" title="Export" type="button" data-bs-toggle="dropdown">
                            <i class="material-icons">save</i> Export Data
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php Html :: export_menus(['pdf', 'print', 'excel', 'csv']); ?>
                            </div>
                        </div>
                        <?php Html :: import_form('awblabel/importdata' , "Import Data"); ?>
                    </div>
                    <div class="col">
                        <?php
                            if($show_pagination == true){
                            $pager = new Pagination($total_records, $record_count);
                            $pager->show_page_count = false;
                            $pager->show_record_count = true;
                            $pager->show_page_limit =false;
                            $pager->limit = $limit;
                            $pager->show_page_number_list = true;
                            $pager->pager_link_range=5;
                            $pager->ajax_page = true;
                            $pager->render();
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
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
