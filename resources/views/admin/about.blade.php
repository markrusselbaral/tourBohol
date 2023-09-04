@extends('admin.layout.master')
@section('content')
<form action="{{ route('about.save') }}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="modal fade" id="exampleModalDefault" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h6 class="modal-title m-0" id="exampleModalDefaultLabel">Add About Content</h6>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
               <div class="row">
                  <!--end col-->
                  <div class="card">
                     <div class="card-body">
                        <div class="mb-3">
                           <label for="textContent">Description</label>
                           <textarea name="text" id="textContent" cols="10" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                           <label for="backgroundImage">Image</label>
                           <input type="file" class="form-control" id="backgroundImage" name="image">
                        </div>
                     </div>
                     <!--end card-body-->
                  </div>
                  <!--end card-->
                  <!--end col-->
               </div>
               <!--end row-->
            </div>
            <!--end modal-body-->
            <div class="modal-footer">
               <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-de-primary btn-sm">Add</button>
            </div>
            <!--end modal-footer-->
         </div>
         <!--end modal-content-->
      </div>
      <!--end modal-dialog-->
   </div>
</form>
<!--end modal-->


<form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('PUT')
   <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h6 class="modal-title m-0" id="exampleModalDefaultLabel">Edit About Content</h6>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
               <div class="row">
                  <!--end col-->
                  <div class="card">
                     <div class="card-body">
                        <div class="mb-3">
                           <label for="editText">Text</label>
                           <input type="hidden" name="id" id="id">
                           <textarea name="text" id="editText" cols="10" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                           <img id="currentImage" style="border-radius:20%; width: 100px; height: 100px; margin-bottom: 1rem;"> <br>
                           <span id="imageFilename" class="text-success"></span>
                           <input type="file" class="form-control" id="editBackgroundImage" name="image">
                        </div>
                     </div>
                     <!--end card-body-->
                  </div>
                  <!--end card-->
                  <!--end col-->
               </div>
               <!--end row-->
            </div>
            <!--end modal-body-->
            <div class="modal-footer">
               <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-de-primary btn-sm">Update</button>
            </div>
            <!--end modal-footer-->
         </div>
         <!--end modal-content-->
      </div>
      <!--end modal-dialog-->
   </div>
</form>
<!--end modal-->




<div class="page-wrapper">
   <!-- Page Content-->
   <div class="page-content-tab">
      <div class="container-fluid">
         <div class="card-body" style="margin-top: 1rem;">
            @if($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">
               {{ session('success') }}
            </div>
            @endif
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalDefault">
            <i class="ti ti-plus menu-icon"> Add
            </i>
            </button>
         </div>
         <!-- Page-Title -->
         <div class="row">
            <div class="col-sm-12">
               <div class="page-title-box">
                  <div class="float-end">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">About</a></li>
                        <li class="breadcrumb-item active">Datatables</li>
                     </ol>
                  </div>
                  <h4 class="page-title"></h4>
               </div>
               <!--end page-title-box-->
            </div>
            <!--end col-->
         </div>
         <!-- end page title end breadcrumb -->
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title">About Contents</h4>
                  </div>
                  <!--end card-header-->
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table" id="datatable_1">
                           <thead class="thead-light">
                              <tr>
                                 <th>Description</th>
                                 <th>image</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($content as $contents)
                              <tr>
                                 <td>{{ $contents->text }}</td>
                                 <td>
                                    <img src="{{ asset('storage/about/'.$contents->image) }}" width="50px" height="50px">
                                 </td>
                                 <td>
                                    <form action="{{ route('about.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                       @csrf
                                       @method('DELETE')
                                       <input type="hidden" value="{{ $contents->id }}" name="id">
                                       <button type="submit" style="border: none; background: none;" class="deleteButton">
                                       <i class="fa fa-trash"></i>
                                       </button>
                                    </form>

                                    <button type="submit" style="border: none; background: none;" class="editbtn" value="{{ $contents->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end col -->
         </div>
         <!-- end row -->
         <!-- end row -->
      </div>
      <!-- container -->
      <!--Start Rightbar-->
      <!--Start Rightbar/offcanvas-->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
         <div class="offcanvas-header border-bottom">
            <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
            <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body">
            <h6>Account Settings</h6>
            <div class="p-2 text-start mt-3">
               <div class="form-check form-switch mb-2">
                  <input class="form-check-input" type="checkbox" id="settings-switch1">
                  <label class="form-check-label" for="settings-switch1">Auto updates</label>
               </div>
               <!--end form-switch-->
               <div class="form-check form-switch mb-2">
                  <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                  <label class="form-check-label" for="settings-switch2">Location Permission</label>
               </div>
               <!--end form-switch-->
               <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="settings-switch3">
                  <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
               </div>
               <!--end form-switch-->
            </div>
            <!--end /div-->
            <h6>General Settings</h6>
            <div class="p-2 text-start mt-3">
               <div class="form-check form-switch mb-2">
                  <input class="form-check-input" type="checkbox" id="settings-switch4">
                  <label class="form-check-label" for="settings-switch4">Show me Online</label>
               </div>
               <!--end form-switch-->
               <div class="form-check form-switch mb-2">
                  <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                  <label class="form-check-label" for="settings-switch5">Status visible to all</label>
               </div>
               <!--end form-switch-->
               <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="settings-switch6">
                  <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
               </div>
               <!--end form-switch-->
            </div>
            <!--end /div-->
         </div>
         <!--end offcanvas-body-->
      </div>
      <!--end Rightbar/offcanvas-->
      <!--end Rightbar-->
   </div>
   <!-- end page content -->
</div>
<!-- end page-wrapper -->
@endsection



@section('edit')
<script>
$(document).ready(function() {
    // When a file is selected
    $('#editBackgroundImage').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#currentImage').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    });
});
</script>


<script>
$(document).ready(function () {
    $(document).on('click', '.editbtn', function () {
        var pid = $(this).val();
        $('#editModal').modal('show');

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Send AJAX request with CSRF token
        $.ajax({
            type: "GET",
            url: "/admin/about/" + pid,
            headers: {
                'X-CSRF-Token': csrfToken
            },
           success: function (response) {
                console.log(response);
                $('#id').val(response.id);
                $('#editText').val(response.text);
                $('#currentImage').attr('src', '{{ asset('storage/about/') }}' + '/' + response.image);
                $('#imageFilename').html(response.image);
                // $('#edit_partylist').val(candidate.partylist);
            },

            error: function (xhr, status, error) {
                console.error('AJAX error:', error);
            }
        });
    });
});
</script>
@endsection



@section('js')
<script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/datatable.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection
@section('css')
<link href="{{ asset('admin/assets/libs/simple-datatables/style.css') }}" rel="stylesheet" type="text/css" />
@endsection
