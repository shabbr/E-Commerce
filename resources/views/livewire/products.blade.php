<div>
    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
                @if ($message != '')
                    <div class="alert alert-success fixed-top" role="alert" wire:poll.1s="clearAlert">
                        <h2>{{ $message }}</h2>
                    </div>
                @endif
                @if ($empty != '')
                    <div class="alert alert-danger fixed-top" role="alert" wire:poll.1s="clearAlert">
                        <h2>{{ $empty }}</h2>
                    </div>
                @endif
            </div>
            <div class="row">


                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">

                                    <a type='submit' href=" {{ route('product_details', ['id' => $product->id]) }}"
                                        class="option1">
                                        Product's Details
                                    </a>


                                    <form action="" wire:submit.prevent="products({{ $product->id }})">
                                        <button type='submit' class="option2">
                                            Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="storage/{{ $product->image }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $product->title }}
                                </h5>
                                @if ($product->discount_price != null)
                                    <h6 style='text-decoration:line-through ; color:red'>
                                        Price <br>
                                        ${{ $product->price }}
                                    </h6>
                                    <h6 style="color:blue">
                                        Price <br>
                                        ${{ $product->discount_price }}
                                    </h6>
                                @else
                                    <h6 style="color:blue">
                                        Price <br>
                                        ${{ $product->price }}
                                    </h6>
                                    </h6>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->links() }}
    </section>
    <!-- end product section -->

</div>
