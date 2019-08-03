@extends('admin.layout.master')
@section('content')
                           
<div class="row mb-2 well mb-4">
     <div class="col-md-12">
        <div class="overview-wrap">
            <h3 class="text-dark">Product Table</h3>
            <a class=" btn   btn-outline-info " href="{{ route('products.create')}}" >
             <i class="zmdi zmdi-plus"></i>Add New</a>
         </div>
      </div>
 </div>

 
<div class="container_fluid  ">
        <div class="table-responsive m-b-40 ">
                <table class="table table-borderless table-data3 " id="productTable">
                <thead class="bg-secondary">
                <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Product Code</th>
                <th>Product Color</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Date</th>
                <td></td>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->product_color }}</td>
                        <td><a href="/images/backend/products/medium/{{ $product->image }}" class=" image" >
                                <img  width="100px" height="50px" src="/images/backend/products/small/{{ $product->image }}" class="zoom img-thumbnail" alt="Image"/></a></td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <div class="row">
                                        
                            <button class="btn  mb-1 productModal" data-toggle="modal" data-target="#scrollmodal" data-data="{{$product}}" >
                                   <i class="fa fa-eye text-dark"></i>
                              </button>
                              <a href="{{ route('products.edit',$product->id)}}" class="btn">
                                 <i class="fas fa-edit text-warning"></i>
                              </a>
                              <form class="deleteProduct" action="{{ route('products.destroy',$product->id)}}" method="POST">
                                     <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn " id="deleteProduct">
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

            <!-----------------------Modal------------------------->

            <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        
                        </div>
                        </div>
                        </div>
                <!--------------------------END Modal--------------------------->

            
</div>

@endsection

@section('script')

<script>
        $(document).ready( function () {
        $('#productTable').DataTable({
                "paging": false
        });

        $(".deleteProduct").click(function(){
                return confirm('Are you sure to delete this category?')
        })
        $('img.zoom')
    .wrap('<span style="display:inline-block;"></span>')
    .css('display', 'block')
    .parent()
    .zoom();
    

    $('.productModal').on("click", function () {
    let data = $(this).data('data');
    $('#scrollmodal .modal-content').html(`

    <div class="col-md-12">



                <div class="row jumbotron" >
                <div class="col-6">
                   <a  class=" image" >
                        <img class="rounded mx-auto d-block " src="/images/backend/products/small/${data.image}" alt="">
                   </a>
                 </p></div>
                <div class="col-6 py-3">
                   <div >
                        <h3  class="card-title mb-5">${data.product_name} ${data.product_code}</h3>
                        <b>Product Name &nbsp;&nbsp;&nbsp;   : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${data.product_name}<br><br>
                        <b>Product Code &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${data.product_code}<br><br>
                        <b>Product Color &nbsp;&nbsp;&nbsp; &nbsp;  : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${data.product_color}<br><br>
                        <b>Product Price &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${data.price}<br>
                        
                 </div>
                </div>

</div>
</div>





   
`)
});
 
});
</script>

@endsection

    
