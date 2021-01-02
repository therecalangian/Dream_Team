

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Drug Potency Assay</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Drug Potency Assay</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <?php if(in_array('createStore', $user_permission)): ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Item</button>
          <br /> <br />
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Items</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <!--<th>Jo. No.</th>-->
                <th>Date</th>
                <th>Generic Name</th>
                <th>Brand Name</th>
                <th>Company</th>
                <th>Purpose</th>
                <th>Quantity</th>
                <th>Expedited</th>
                <th>Status</th>
                <th>Expiry Date of Sample</th>
                <th>Expiry Date of Standard</th>
                <?php if(in_array('updateStore', $user_permission) || in_array('deleteStore', $user_permission)): ?>
                  <th>Action</th>
                <?php endif; ?>
              </tr>
              </thead>

            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php if(in_array('createStore', $user_permission)): ?>
<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Item</h4>
      </div>

      <form role="form" action="<?php echo base_url('stores/create') ?>" method="post" id="createForm">

        <div class="modal-body">
          <div class="form-group">
            <label for="date_added">Date</label>
            <input type="date" class="form-control" id="date_added" name="date_added" placeholder="Enter date" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="company">Company</label>
            <input type="text" class="form-control" id="company" name="company" placeholder="Enter company" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="company_address">Company Address</label>
            <input type="text" class="form-control" id="company_address" name="company_address" placeholder="Enter company address" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="company_person">Contact Person</label>
            <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter contact person" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="mobile_number">Mobile No.</label>
            <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter mobile number" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="email_address">Email Address</label>
            <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Enter email address" autocomplete="off" required>
          </div>
          <br>

          <label>Sample</label>
          <div class="form-group">
            <label for="generic_name">Generic Name</label>
            <input type="text" class="form-control" id="generic_name" name="generic_name" placeholder="Enter generic name" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="brand_name">Brand Name</label>
            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter brand name" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="purpose">Purpose</label>
            <select class="form-control" id="purpose" name="purpose">
              <option value="1">Hospital Bidding/Inclusion</option>
              <option value="2">Thesis/Dissertation/Special Project</option>
              <option value="3">Others</option>
            </select>
            <label for="purpose_others">If others:</label>
            <input type="text" class="form-control" id="purpose_others" name="purpose_others" placeholder="Enter purpose" autocomplete="off">
          </div>
          <br>
          <div class="form-group">
            <label for="procedure_drug_assay">Procedure for the Drug Assay</label>
            <select class="form-control" id="procedure_drug_assay" name="procedure_drug_assay">
              <option value="1">Yes</option>
              <option value="2">No</option>
            </select>
          </div>
           <div class="form-group">
            <label for="coa_finished_product">Certificate of Analysis of the Finished Product</label>
            <select class="form-control" id="coa_finished_product" name="coa_finished_product">
              <option value="1">Yes</option>
              <option value="2">No</option>
            </select>
          </div>
           <div class="form-group">
            <label for="coa_reference_standard">Certificate of Analysis of the Reference Standard</label>
            <select class="form-control" id="coa_reference_standard" name="coa_reference_standard">
              <option value="1">Yes</option>
              <option value="2">No</option>
            </select>
          </div>
          <br>

          <label>Finished Product</label>
           <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" min="0" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="expedited">Expedited</label>
            <select class="form-control" id="expedited" name="expedited">
              <option value="1">Yes</option>
              <option value="2">No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="lot_number">Lot No.</label>
            <input type="number" min="0" class="form-control" id="lot_number" name="lot_number" placeholder="Enter lot number" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="drp_number">DRP No.</label>
            <input type="number" min="0" class="form-control" id="drp_number" name="drp_number" placeholder="Enter DRP number" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="manufacturer">Manufacturer</label>
            <input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Enter manufacturer" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="distributor">Distributor</label>
            <input type="text" class="form-control" id="distributor" name="distributor" placeholder="Enter distributor" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="manufacturing_date">Manufacturing Date</label>
            <input type="date" class="form-control" id="manufacturing_date" name="manufacturing_date" placeholder="Enter manufacturing date" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="exp_sample">Expiry Date of Sample</label>
            <input type="date" class="form-control" id="exp_sample" name="exp_sample" placeholder="Enter expiry date of sample" autocomplete="off">
          </div>
          <br>

          <label>Reference Standard</label>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="purity">% Purity</label>
            <input type="number" min="0" class="form-control" id="purity" name="purity" placeholder="Enter % purity" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="batch_number">Batch No.</label>
            <input type="number" min="0" class="form-control" id="batch_number" name="batch_number" placeholder="Enter batch number" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="exp_standard">Expiry Date of Standard</label>
            <input type="date" class="form-control" id="exp_standard" name="exp_standard" placeholder="Enter expiry date of standard" autocomplete="off">
          </div>
          <br>

          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="active" name="active">
              <option value="1">Pending</option>
              <option value="2">Done</option>
            </select>
          </div>
          <label>Certificate of Analysis</label>
          <!--<input type="submit" value="Upload File" name="upload_file">-->
          
          
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('updateStore', $user_permission)): ?>
<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Item</h4>
      </div>

      <form role="form" action="<?php echo base_url('stores/update') ?>" method="post" id="updateForm">

        <div class="modal-body">
          <div id="messages"></div>

          <div class="form-group">
            <label for="edit_date_added">Date</label>
            <input type="date" class="form-control" id="edit_date_added" name="edit_date_added" placeholder="Enter date" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_company">Company</label>
            <input type="text" class="form-control" id="edit_company" name="edit_company" placeholder="Enter company" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="edit_company_address">Company Address</label>
            <input type="text" class="form-control" id="edit_company_address" name="edit_company_address" placeholder="Enter company address" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="edit_company_person">Contact Person</label>
            <input type="text" class="form-control" id="edit_contact_person" name="edit_contact_person" placeholder="Enter contact person" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="edit_mobile_number">Mobile No.</label>
            <input type="text" class="form-control" id="edit_mobile_number" name="edit_mobile_number" placeholder="Enter mobile number" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="edit_email_address">Email Address</label>
            <input type="text" class="form-control" id="edit_email_address" name="edit_email_address" placeholder="Enter email address" autocomplete="off" required>
          </div>
          <br>

          <label>Sample</label>
          <div class="form-group">
            <label for="edit_generic_name">Generic Name</label>
            <input type="text" class="form-control" id="edit_generic_name" name="edit_generic_name" placeholder="Enter generic name" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="edit_brand_name">Brand Name</label>
            <input type="text" class="form-control" id="edit_brand_name" name="edit_brand_name" placeholder="Enter brand name" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="edit_purpose">Purpose</label>
            <select class="form-control" id="edit_purpose" name="edit_purpose">
              <option value="1">Hospital Bidding/Inclusion</option>
              <option value="2">Thesis/Dissertation/Special Project</option>
              <option value="3">Others</option>
            </select>
            <label for="edit_purpose_others">If others:</label>
            <input type="text" class="form-control" id="edit_purpose_others" name="edit_purpose_others" placeholder="Enter purpose" autocomplete="off">
          </div>
          <br>
          <div class="form-group">
            <label for="edit_procedure_drug_assay">Procedure for the Drug Assay</label>
            <select class="form-control" id="edit_procedure_drug_assay" name="edit_procedure_drug_assay">
              <option value="1">Yes</option>
              <option value="2">No</option>
            </select>
          </div>
           <div class="form-group">
            <label for="edit_coa_finished_product">Certificate of Analysis of the Finished Product</label>
            <select class="form-control" id="edit_coa_finished_product" name="edit_coa_finished_product">
              <option value="1">Yes</option>
              <option value="2">No</option>
            </select>
          </div>
           <div class="form-group">
            <label for="edit_coa_reference_standard">Certificate of Analysis of the Reference Standard</label>
            <select class="form-control" id="edit_coa_reference_standard" name="edit_coa_reference_standard">
              <option value="1">Yes</option>
              <option value="2">No</option>
            </select>
          </div>
          <br>

          <label>Finished Product</label>
           <div class="form-group">
            <label for="edit_quantity">Quantity</label>
            <input type="number" min="0" class="form-control" id="edit_quantity" name="edit_quantity" placeholder="Enter quantity" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_expedited">Expedited</label>
            <select class="form-control" id="edit_expedited" name="edit_expedited">
              <option value="1">Yes</option>
              <option value="2">No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="edit_lot_number">Lot No.</label>
            <input type="number" min="0" class="form-control" id="edit_lot_number" name="edit_lot_number" placeholder="Enter lot number" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_drp_number">DRP No.</label>
            <input type="number" min="0" class="form-control" id="edit_drp_number" name="edit_drp_number" placeholder="Enter DRP number" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_manufacturer">Manufacturer</label>
            <input type="text" class="form-control" id="edit_manufacturer" name="edit_manufacturer" placeholder="Enter manufacturer" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="edit_distributor">Distributor</label>
            <input type="text" class="form-control" id="edit_distributor" name="edit_distributor" placeholder="Enter distributor" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="edit_manufacturing_date">Manufacturing Date</label>
            <input type="date" class="form-control" id="edit_manufacturing_date" name="edit_manufacturing_date" placeholder="Enter manufacturing date" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_exp_sample">Expiry Date of Sample</label>
            <input type="date" class="form-control" id="edit_exp_sample" name="edit_exp_sample" placeholder="Enter expiry date of sample" autocomplete="off">
          </div>
          <br>

          <label>Reference Standard</label>
          <div class="form-group">
            <label for="edit_name">Name</label>
            <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Enter name" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="edit_purity">% Purity</label>
            <input type="number" min="0" class="form-control" id="edit_purity" name="edit_purity" placeholder="Enter % purity" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_batch_number">Batch No.</label>
            <input type="number" min="0" class="form-control" id="edit_batch_number" name="edit_batch_number" placeholder="Enter batch number" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_exp_standard">Expiry Date of Standard</label>
            <input type="date" class="form-control" id="edit_exp_standard" name="edit_exp_standard" placeholder="Enter expiry date of standard" autocomplete="off">
          </div>
          <br>

          <div class="form-group">
            <label for="edit_active">Status</label>
            <select class="form-control" id="edit_active" name="edit_active">
              <option value="1">Pending</option>
              <option value="2">Done</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('deleteStore', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Item</h4>
      </div>

      <form role="form" action="<?php echo base_url('stores/remove') ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>



<script type="text/javascript">
var manageTable;

$(document).ready(function() {

  $("#storeNav").addClass('active');

  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': 'fetchStoresData',
    'order': []
  });

  // submit the create from 
  $("#createForm").unbind('submit').on('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(), // /converting the form data into array and sending it to server
      dataType: 'json',
      success:function(response) {

        manageTable.ajax.reload(null, false); 

        if(response.success === true) {
          $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
          '</div>');


          // hide the modal
          $("#addModal").modal('hide');

          // reset the form
          $("#createForm")[0].reset();
          $("#createForm .form-group").removeClass('has-error').removeClass('has-success');

        } else {

          if(response.messages instanceof Object) {
            $.each(response.messages, function(index, value) {
              var id = $("#"+index);

              id.closest('.form-group')
              .removeClass('has-error')
              .removeClass('has-success')
              .addClass(value.length > 0 ? 'has-error' : 'has-success');
              
              id.after(value);

            });
          } else {
            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>');
          }
        }
      }
    }); 

    return false;
  });

});

// edit function
function editFunc(id)
{ 
  $.ajax({
    url: 'fetchStoresDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#edit_date_added").val(response.date_added);
      $("#edit_generic_name").val(response.generic_name);
      $("#edit_brand_name").val(response.brand_name);
      $("#edit_company").val(response.company);
      $("#edit_purpose").val(response.purpose);
      $("#edit_quantity").val(response.quantity);
      $("#edit_expedited").val(response.expedited);
      $("#edit_active").val(response.active);
      $("#edit_exp_sample").val(response.exp_sample);
      $("#edit_exp_standard").val(response.exp_standard);

      // submit the edit from 
      $("#updateForm").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(), // /converting the form data into array and sending it to server
          dataType: 'json',
          success:function(response) {

            manageTable.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');


              // hide the modal
              $("#editModal").modal('hide');
              // reset the form 
              $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

            } else {

              if(response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#"+index);

                  id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');
                  
                  id.after(value);

                });
              } else {
                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                '</div>');
              }
            }
          }
        }); 

        return false;
      });

    }
  });
}

// remove functions 
function removeFunc(id)
{
  if(id) {
    $("#removeForm").on('submit', function() {

      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: { store_id:id }, 
        dataType: 'json',
        success:function(response) {

          manageTable.ajax.reload(null, false); 

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeModal").modal('hide');

          } else {

            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>'); 
          }
        }
      }); 

      return false;
    });
  }
}


</script>
