@extends('layouts.master')
@section('content')
    <div class="row">
        @if(count($products))
            @foreach($products as $product)
                <div class="col-md-3 mt-5 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('assets/img/pexels.jpeg')}}" alt="Card image cap">
                        <div class="card-body bg-light">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">Price: {{$currency->symbol.number_format($product->price*$convert_rate, 2)}}</p>
                            <div class="form-group">
                                <input type="number" id="quantity_{{$product->id}}" min="1" max="50" placeholder="Quantity" class="form-control">
                            </div>
                            <div class="form-group">
                                <select id="size_id_{{$product->id}}" class="form-control">
                                    <option value="">Select Size</option>
                                    @if(count($product->product_sizes))
                                        @foreach($product->product_sizes as $product_size)
                                            <option value="{{$product_size->sizes->id}}">{{$product_size->sizes->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary add_to_cart" data-id="{{$product->id}}">Add to cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="col-md-12">
            {{$products->links()}}
        </div>
    </div>
@endsection
@section('page-scripts')
<script>
    $('.add_to_cart').on('click', function (){
        var id= $(this).data('id');
        var quantity=$('#quantity_'+id).val();
        var size_id=$('#size_id_'+id).val();

        if (quantity==null || quantity===''){
          alert('Please enter quantity');
          return false;
        }
        if (size_id==null || size_id===''){
            alert('Please select size');
            return false;
        }

        $.ajax({
            type:'POST',
            url:'{{route('addToCart')}}',
            data:{
                _token: "{{ csrf_token() }}",
                product_id:id,
                quantity:quantity,
                size_id:size_id
            },
            success: function(data){
                alert('Product added in cart.');
            },
            error: function(data){
                alert('Something went wrong.');
            },
        });
    });
</script>
@endsection
