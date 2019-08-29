@extends('admin.layout.master')
@section('content')
                           
<div class="row mb-2 well mb-4">
     <div class="col-md-12">
        <div class="overview-wrap">
            <h3 class="text-dark">Category Table</h3>
            <a class=" btn   btn-outline-info " href="{{ route('category.create')}}" >
             <i class="zmdi zmdi-plus"></i>Add New</a>
         </div>
      </div>
 </div>

<div class="container_fluid  ">
        <div class="table-responsive m-b-40 ">
                <table class="table table-borderless table-data3 " id="categoryTable">
                <thead class="bg-secondary">
                <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>No. of Parent</th>
                <th>status</th>
                <th>Date</th>
                <td></td>
                </tr>
                </thead>
                <tbody>
                   @foreach($categories as $index => $category)
                        <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td ><p class="pl-5">{{ $category->parent_id }}</p></td>
                        <td >
                                @if($category->status)
                                <span class='text-success'>Enabled</span>  
                                @else
                                <span class='text-danger'>Disabled</span>
                                @endif
                        </td>

                        <td>{{ $category->updated_at }}</td>
                        <td>
                                <div class="row">
                                  <a href="{{ route('category.edit',$category->id)}}" class="btn ">
                                     <i class="fas fa-edit text-warning"></i>
                                  </a>
                                  <form class="deleteCategory" action="{{ route('category.destroy',$category->id)}}" method="POST">
                                         <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn " id="deleteCategory">
                                           <i class="fas fa-trash text-danger"></i>
                                        </button>
                                  </form>
                                  
                                </div>
                        </td>
                        </tr>
                  @endforeach
                </tbody>
                </table>
            </div>

            
</div>

@endsection

@section('script')

<script>
        $(document).ready( function () {
        $('#categoryTable').DataTable({
                "paging": false
        });

        $(".deleteCategory").click(function(){
                return confirm('Are you sure to delete this category?')
        })
    } );
</script>

@endsection

    
