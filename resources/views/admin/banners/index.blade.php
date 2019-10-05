@extends('admin.layout.master')
@section('content')
                           
<div class="row mb-2 well mb-4">
     <div class="col-md-12">
        <div class="overview-wrap">
            <h3 class="text-dark">Bannner Table</h3>
            <a class=" btn   btn-outline-info " href="{{ route('banners.create')}}" >
             <i class="zmdi zmdi-plus"></i>Add New</a>
         </div>
      </div>
 </div>

<div class="container_fluid  ">
        <div class="table-responsive m-b-40 ">
                <table class="table table-borderless table-data3 " id="bannerTable">
                <thead class="bg-secondary">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>status</th>
                        
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                   @foreach($banners as $index => $banner)
                        <tr>
                           <td>{{ $index+1 }}</td>
                            <td><img src="/images/backend/banners/{{ $banner->image }}" width=" 150px" alt=""></td>
                            <td>{{ $banner->title }}</td>
                            <td>{{ $banner->link }}</td>
                            <td>{!! $banner->status ? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>'!!}</td>
                            
                            <td>
                                <div class="row">
                                  <a href="{{ route('banners.edit',$banner->id)}}" class="btn ">
                                     <i class="fas fa-edit text-warning"></i>
                                  </a>
                                  <form class="deleteBanners" action="{{ route('banners.destroy',$banner->id)}}" method="POST">
                                         <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn " id="deleteCoupons">
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
        $('#bannerTable').DataTable({
                "paging": false
        });

        $(".deleteBanners").click(function(){
                return confirm('Are you sure to delete this category?')
        })
    } );
</script>

@endsection

    
