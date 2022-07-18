@extends('layout.master')
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        @section('content')
<h1>mim</h1>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Add Client Information</h4>
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
                    @elseif(session()->get('message')=='edit')
                        <div class="alert alert-success">
                            <p>Successfully Edited</p>
            
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
                                    <li class="breadcrumb-item active" aria-current="page">Client Details</li>
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
                <div id="insert_form" class="col-12  w-75 m-auto">
                    <div class="card main_client_details">
                        <div class="card-body">
                            <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                            <form action='{{url("/admin/insert_client_information")}}' method="POST" class="form-horizontal form-material mx-2">
                              @csrf
                         
                            <div class="form-group d-flex ">
                                    <label class="col-sm-12" style="width: 25%;">Project Type</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select name='p_id' class="form-select shadow-none form-control-line">
                                            <option value="">Select Client Type</option>
                                          @foreach($project_type as $data)
                                            <option value="{{$data->id}}">{{$data->project_type_name}}</option>
                                          @endforeach
                                        </select>
                                    </div> 
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='client_name' type="text" placeholder="Insert Client Name" class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Website</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='client_website' type="url" placeholder="Insert Client Website" class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">E-Mail</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='client_email' type="email" placeholder="Insert Client E-Mail" class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Phone</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='client_phone' type="text" placeholder="Insert Client phone" class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Address</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <textarea name="client_address" class="form-control" id="exampleFormControlTextarea1" rows="3" cols="50" ></textarea>
                                       
                                        
                                    </div>
                                </div>
                               
                                <div class="form-group d-flex">
                                    <div class="col-sm-12" style="width: 25%;"></div>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <button href='insert_ps' class="btn btn-success text-white">Save</button>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>

                        
                    </div>
                    <div class="card edit_client_details">
                        <div class="card-body">
                                <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                                <form action='{{url("/admin/edit_client_information")}}' method="POST" class="form-horizontal form-material mx-2">
                                @csrf
                                @method('PUT')
                            
                                <div class="form-group d-flex">
                                        <label class="col-sm-12" style="width: 25%;">Project Type</label>
                                        <div class="col-sm-12" style="width: 75%;">
                                            <select name='p_id'  class="form-select shadow-none form-control-line ">
                                                <option value="">Select Client Type</option>
                                            @foreach($project_type as $data)
                                                <option value="{{$data->id}}">{{$data->project_type_name}}</option>
                                            @endforeach
                                            </select>
                                        </div> 
                                    </div>

                                    <div class="form-group d-flex ">
                                        <label class="col-sm-12" style="width: 25%;">Name</label>
                                        <div class="col-sm-12" style="width: 75%;">
                                            <input name='client_name' id = "edit_client_name" type="text" placeholder="Insert Client Name" class="form-control form-control-line " >
                                            <input name='edit_client_name_id' id = "edit_client_name_id" placeholder="Insert Client Name" class="form-control form-control-line "  type="hidden">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label class="col-sm-12" style="width: 25%;">Website</label>
                                        <div class="col-sm-12" style="width: 75%;">
                                            <input name='client_website' id="edit_client_website" type="url" placeholder="Insert Client Website" class="form-control form-control-line" >
                                            <input name='edit_client_website_id' id="edit_client_website_id"  placeholder="Insert Client Website" class="form-control form-control-line"   type="hidden">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label class="col-sm-12" style="width: 25%;">E-Mail</label>
                                        <div class="col-sm-12" style="width: 75%;">
                                            <input name='client_email' id="edit_client_email" type="email" placeholder="Insert Client E-Mail" class="form-control form-control-line" >
                                            <input name='edit_client_email_id' id="edit_client_email_id"  placeholder="Insert Client E-Mail" class="form-control form-control-line"  type="hidden">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label class="col-sm-12" style="width: 25%;">Phone</label>
                                        <div class="col-sm-12" style="width: 75%;">
                                            <input name='client_phone' id="edit_client_phone" type="text" placeholder="Insert Client phone" class="form-control form-control-line" >
                                            <input name='edit_client_phone_id' id="edit_client_phone_id"  placeholder="Insert Client phone" class="form-control form-control-line"   type="hidden">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label class="col-sm-12" style="width: 25%;">Address</label>
                                        <div class="col-sm-12" style="width: 75%;">
                                            <textarea name="client_address" id="edit_client_address" class="form-control" id="exampleFormControlTextarea1" rows="3" cols="50" ></textarea>
                                            <input name='edit_client_address_id' id="edit_client_address_id"   class="form-control form-control-line"   type="hidden">
                                            
                                        </div>
                                    </div>
                                
                                    <div class="form-group d-flex">
                                        <div class="col-sm-12" style="width: 25%;"></div>
                                        <div class="col-sm-12" style="width: 75%;">
                                            <button  type="submit" class="btn btn-success text-white edit_id ">Edit</button>
                                            <button href='insert_ps' class="btn btn-success text-white btn_back">Back</button>
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
                                            <th class="border-top-0 text-center">Project Type</th>
                                            <th class="border-top-0 text-center">Client Name</th>
                                            <th class="border-top-0 text-center">Client Website</th>
                                            <th class="border-top-0 text-center">Client Email</th>
                                            <th class="border-top-0 text-center">Client Phone</th>
                                            <th class="border-top-0 text-center">Client Adress</th>
                                            <th class="border-top-0 text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($query_client as $data)
                                        <tr>
                                        <!--  -->
                                        <td style='line-height: 0.5;padding: .5rem;text-align: center;display: none;'>{{$data->id}}
                                            </td>
                                            <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$loop->index+1}}
                                            </td>
                                            <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->project_type_name}}</td>
                                            <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->client_name}}</td>
                                            <td style='line-height: 0.5;padding: .5rem; text-align: center'>{{$data->client_website}}</td>
                                            <td style='line-height: 0.5;padding: .5rem; text-align: center'>{{$data->client_email}}</td>
                                            <td style='line-height: 0.5;padding: .5rem; text-align: center'>{{$data->client_phone}}</td>
                                            <td style='line-height: 0.5;padding: .5rem; text-align: center'>{{$data->client_address}}</td>
                                            <td class='td_css' style='line-height: 0.5;padding: .5rem;text-align: center'>
                                            <a id="edit_btn" class="edit_btn" pid="{{$data->id}}" name="btn_edit" class="btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>
                                            <form class="spacing" method="POST" action='#'>
                                                @csrf
                                                @method('delete')
                                                <button id='custom-btn' class="btn btn-danger" onclick="return confirm('Are you sure??')"> <i class="bi bi-trash"></i></button>
                                             </form>
                                        </td>
                                        
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by . Designed and Developed by
                <a href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
            
        @endsection


      
 
        
    