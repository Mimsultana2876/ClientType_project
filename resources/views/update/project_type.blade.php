
  @extends('layout.master')
  <!-- Page wrapper  -->
  <!-- ============================================================== -->
  @section('content')

  <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
          <div class="row">
              <div class="col-5 align-self-center">
                  <h4 class="page-title">Client Type</h4>
              </div>
            @if(session()->has('message'))
                @if(session()->get('message')=='exist')
                    <div class="alert alert-danger">
                        <p>These values are exist</p>
        
                    </div>
                @elseif(session()->get('message')=='delete')
                    <div class="alert alert-success">
                        <p>Successfully deleted</p>
        
                    </div>
                @elseif(session()->get('message')=='insert')
                    <div class="alert alert-success">
                        <p>Successfully Added</p>
        
                    </div>
                @elseif(session()->get('message')=='updated')
                    <div class="alert alert-success">
                        <p>Successfully Updated</p>
        
                    </div>
                @endif
            @endif
              <div class="col-7 align-self-center">
                  <div class="d-flex align-items-center justify-content-end">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item">
                                  <a href="#">Home</a>
                              </li>
                              <li class="breadcrumb-item active" aria-current="page">Project  Type</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div> 
      </div>

      @if ($errors->any())
      <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
            @endforeach
         </ul>
         </div>
         @endif
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">

          <!-- ============================================================== -->
          <!-- Add Police Station -->
          <div class="col-12  w-75 m-auto">
              <div class="card">
                  <div class="card-body main_project_type">
                      <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                      <form action='{{url('/admin/insert_project_type')}}' method="POST" class="form-horizontal form-material mx-2">
                            @csrf
                            
                            <div class="form-group d-flex">
                                <label class="col-sm-12" style="width: 25%;"> Project Type</label>
                                <div class="col-sm-12" style="width: 75%;">
                                    <input name='project_type_name' type="text" placeholder="Insert Project Type" class="form-control form-control-line" >
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <div class="col-sm-12" style="width: 25%;"></div>
                                <div class="col-sm-12" style="width: 75%;">
                                    <button class="btn btn-success text-white">save</button>
                                </div>
                            </div>
                          
                      </form>
                  </div>
                  <div class="card-body edit_project_type" style="display:none">
                      <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                      <form action='{{url('/admin/edit_project_type')}}' method="POST" class="form-horizontal form-material mx-2">
                            @csrf
                            @method ('PUT')
                            
                            <div class="form-group d-flex">
                                <label class="col-sm-12" style="width: 25%;"> Edit Project Type</label>
                                <div class="col-sm-12" style="width: 75%;">
                                    <input name='project_type_name' id="edit_project_type_name" type="text" placeholder="Edit Project Type" class="form-control form-control-line" >
                                    <input name='edit_id' id="edit_id" type="hidden"  class="form-control form-control-line" >
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <div class="col-sm-12" style="width: 25%;"></div>
                                <div class="col-sm-12" style="width: 75%;">
                                    <button type="submit" class="btn btn-success text-white">Edit</button>
                                    <button class="btn btn-success text-white">Back</button>
                                </div>
                               
                            </div>
                          
                      </form>
                  </div>
              </div>
          </div>

          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Add Police Station -->
          <!-- ============================================================== -->

          {{-- =======================================================================================================
    ==============================       Show show table        ===========================================
    ==================================================================================================== --}}
                <div class="row">
                    <!-- column -->
                    <div class="col-12   m-auto">
                        <div class="card">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0 text-center" style="display:none">ID</th>
                                            <th class="border-top-0 text-center">S.L.</th>
                                            <th class="border-top-0 text-center">Client Type</th>
                                            <th class="border-top-0 text-center">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($query_project_type as $data)
                                        <tr>
                                            <!--  -->
                                            <td style='line-height: 0.5;padding: .5rem;text-align: center;display: none'>{{$data->id}}
                                            </td>
                                            <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$loop->index+1}}
                                            </td>
                                            <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->project_type_name}}</td>
                                            <td class='td_css' style='line-height: 0.5;padding: .5rem;text-align: center'>
                                            <a  href='#'  class="btn btn-info btn_edit" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i>
                                            </a>

                                            <!-- <form class="spacing" method="POST" action='#' > -->
                                                <meta name="csrf-token" content={{ csrf_token()  }}>
                                                @csrf
                                                @method('delete')
                                                <button id='custom-btn'  class="btn btn-danger delete_btn"> <i class="bi bi-trash" onclick="return confirm('Are you sure??')"></i> </button>
                                            <!-- </form> -->
                                    
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- =======================================================================================================
    ==============================     End Show show table        ===========================================
    ==================================================================================================== --}}







            </div>







      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class="footer text-center">
          All Rights Reserved by Nice admin. Designed and Developed by
          <a href="https://www.wrappixel.com">WrapPixel</a>.
      </footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
  </div>
 
      
  @endsection


  

