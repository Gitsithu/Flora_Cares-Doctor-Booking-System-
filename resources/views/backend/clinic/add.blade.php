@include('layouts.partial.master')
<section class="content">
        <div class="container-fluid">
             <div class="row">
                 @if (session('success'))
                 <div class="flash-message col-md-12">
                     <div class="alert alert-success ">
                         {{session('success')}}
                     </div>
                 </div>
                 @elseif(session('fail'))
                 <div class="flash-message col-md-12">
                     <div class="alert alert-danger">
                         {{session('fail')}}
                     </div>
                 </div>
                
                 @endif
                       @if (count($errors) > 0)
                                       <div class="content mt-3">
                                           <!-- div class=row content start -->
                                           <div class="animated fadeIn">
                                               <!-- div class=FadeIn start -->
                                               <div class="card">
                                                   <!-- card start -->
                                   
                                                   <div class="card-body">
                                                       <!-- card-body start -->
                                   
                                   
                                                       <div class="row">
                                                           <!-- div class=row One start -->
                                                           @foreach ($errors->all() as $error)
                                                           <div class="col-md-12">
                                                               <!-- div class=col 12 One start -->
                                                               <p class="text-danger">* {{ $error }}</p>
                                                           </div><!-- div class=col 12 One end -->
                                                           @endforeach
                                                       </div><!-- div class=row One end -->
                                   
                                   
                                                   </div> <!-- card-body end -->
                                   
                                               </div><!-- card end -->
                                           </div><!-- div class=FadeIn start -->
                                       </div><!-- div class=row content end -->
                                       @endif
             </div>

   <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Doctor
                            </h2>
                        </div>
                        <div class="body">
           
  <div class="row clearfix">
                                <div class="col-md-12">
                                <div class="table-responsive">
                                
                                <form id="confirm_create_" action="/backend/clinic/doctorstore" method="post" enctype="multipart/form-data">
                                           <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                           @foreach($obj as $obj)
                                                            <input type="hidden" name="clinic_id" value="{{$obj->id}}">

                                                            @endforeach
                                <table id="myTable" class=" table order-list">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Date</td>
                                        <td>Start Time</td>
                                        <td>End Time</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-sm-3">
                                            <select name="user_doctor_id[]" id="" class="form-control">
                                            @foreach($doctor as $doc)
                                            <option value="{{$doc->id}}">{{$doc->name}}</option>
                                            @endforeach
                                            </select>
                                        </td>
                                        <td class="col-sm-3">
                                            <select name="day[]" id="" class="form-control">
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturaday">Saturaday</option>
                                            <option value="Sunday">Sunday</option>
                                            </select>
                                        </td>
                                        <td class="col-sm-3">
                                            <input type="time" name="from_time[]"  class="form-control"/>
                                        </td>
                                        <td class="col-sm-3">
                                            <input type="time" name="to_time[]"  class="form-control"/>
                                        </td>
                                        <td class="col-sm-2"><a class="deleteRow"></a>

                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" style="text-align: left;">
                                            <input type="button" class="btn btn-warning btn-block " id="addrow" value="Add Row" />
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </tfoot>
                            </table>
                            </form>
                            </div>

                            <div class="card-footer">
                                               <button type="button" onclick="myFunction1()" class="btn btn-fill btn-primary"> <i class="tim-icons icon-send"></i> Save</button>
                                             </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                
<script>
$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        
        cols += '<td><select name="user_doctor_id[]" id="" class="form-control"' + counter + '"><?php foreach($doctor as $doc){ echo '<option value="'. $doc->id . '">'. $doc->name .'</option>';}?></td>';
        cols += '<td><select name="day[]" id="" class="form-control"' + counter + '"><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturaday">Saturaday</option><option value="Sunday">Sunday</option></select></td>';
        cols += '<td><input type="time" class="form-control" name="from_time[]' + counter + '"/></td>';
        cols += '<td><input type="time" class="form-control" name="to_time[]' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}

function myFunction1() {
      
      event.preventDefault();
      swal({
      title: "Are you sure?",
      text: "Once created, you cannot change data again.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      }).then((willDelete) => {
      if (willDelete) {
      $("#confirm_create_").off("submit").submit();
      swal("You have successfully created", {
      icon: "success",
      });
    } 
  
  });
}
</script>