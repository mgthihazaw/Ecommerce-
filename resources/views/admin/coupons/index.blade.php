@extends('admin.layout.master')
@section('content')
                           
<div class="row mb-2 well mb-4">
     <div class="col-md-12">
        <div class="overview-wrap">
            <h3 class="text-dark">Coupon Table</h3>
            <a class=" btn   btn-outline-info " href="{{ route('coupons.create')}}" >
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
                        <th>Coupon Code</th>
                        <th>Amount</th>
                        <th>Amount Type</th>
                        <th>status</th>
                        <th>Expiry Date</th>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                   @foreach($coupons as $index => $coupon)
                        <tr>
                           <td>{{ $index+1 }}</td>
                            <td>{{ $coupon->coupon_code }}</td>
                            <td>{{ $coupon->amount }}</td>
                            <td>{{ $coupon->amount_type == "percentage" ? '%' : 'Kyats' }}</td>
                            <td>{!! $coupon->status ? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>'!!}</td>
                            <td>{{ $coupon->expiry_date }}</td>
                            <td>
                                <div class="row">
                                  <a href="{{ route('coupons.edit',$coupon->id)}}" class="btn ">
                                     <i class="fas fa-edit text-warning"></i>
                                  </a>
                                  <form class="deleteCoupons" action="{{ route('coupons.destroy',$coupon->id)}}" method="POST">
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
        $('#categoryTable').DataTable({
                "paging": false
        });

        $(".deleteCategory").click(function(){
                return confirm('Are you sure to delete this category?')
        })
    } );
</script>

@endsection

    
