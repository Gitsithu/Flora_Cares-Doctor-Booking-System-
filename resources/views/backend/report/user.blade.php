@include('layouts.partial.master')

<!-- Exportable Table -->
<section class="content">
        <div class="container-fluid">
        

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Phone</th>
                                                @if(Auth::user()->role_id==1)
                                                <th>Role</th>
                                                @endif
                                                <th>Address</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $obj)
                                       
                                            <tr>
                                                <td>{{ $obj->name }}</td>
                                                <td>{{ $obj->email }}</td>
                                                <td><img src="{{ $obj->image }}" width="50" height="50" /></td>
                                                <td>{{ $obj->phone }}</td>
                                                @if(Auth::user()->role_id==1)
                                                <td>
                                                    <b>
                                                        @if($obj->role_id == 2)
                                                        <p class="text-primary">Doctor</p>
                                                        @elseif($obj->role_id == 3)
                                                        <p class="text-primary">User</p>
                                                        @else
                                                        <p class="text-danger">Admin</p>
                                                        @endif
                                                    </b>
                                                </td>
                                                @endif
                                                <td>{{ $obj->address }}</td>
                                                <td>{{ $obj->description }}</td>
                                                
                                                <td>
                                                @if($obj->status == 1)
                                                <p class="text-success">Active</p>
                                                @else
                                                <p class="text-danger">In-Active</p>
                                                @endif
                                                </td>
                                                <td>{{ $obj->created_at}}</td>
                                                <td>{{ $obj->updated_at}}</td>

                                                
                                            
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Name</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Phone</th>
                                                @if(Auth::user()->role_id==1)
                                                <th>Role</th>
                                                @endif
                                                <th>Address</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                               
                        
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </div>
                        </div>
                    </div>
                </div>
</div>
                </div>
        </section>

            <!-- #END# Exportable Table -->

