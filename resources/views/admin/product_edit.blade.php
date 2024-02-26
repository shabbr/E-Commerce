<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<form action=" {{route('update_product',['id' => $product->id])}} " method="post" class="col-6 ml-5">
    @csrf
@method('put');
<div class="form-group">
  <label for="">Title</label>
  <input type="text" name="title" value="{{$product->title}}" id="" class="form-control" placeholder="title" aria-describedby="helpId">
  <small id="helpId" class="text-muted">
    @error('title')
  {{$message}}
    @enderror
  </small>
</div>
<div class="form-group">
  <label for="">Descriprion</label>
  <input type="text" name="description"  value="{{$product->description}}" id="" class="form-control" placeholder="Description" aria-describedby="helpId">
  <small id="helpId" class="text-muted">
    @error('description')
    {{$message}}
      @enderror
  </small>
</div>

<div class="form-group">
  <label for="">Product Image</label>
  <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
  <small id="helpId" class="text-muted">Help text</small>
</div>
<select name="category" id="">
    <option value={{$myCategory->id}}> {{$myCategory->category}} </option>
 @foreach($category as $category)
 <option value={{$category->id}}> {{$category->category}} </option>
 @endforeach

</select>
<small>
    @error('category')
    {{$message}}
      @enderror
</small>
<div class="form-group">
  <label for="">Price</label>
  <input type="text" name="price" value="{{$product->price}}"  id="" class="form-control" placeholder="price" aria-describedby="helpId">
  <small id="helpId" class="text-muted">
    @error('price')
    {{$message}}
      @enderror
  </small>
</div>

<div class="form-group">
  <label for="">Quantity</label>
  <input type="number" name="quantity" value="{{$product->quantity}}"  id="" class="form-control" placeholder="Qusantity" aria-describedby="helpId">
  <small id="helpId" class="text-muted">
    @error('quantity')
    {{$message}}
      @enderror
  </small>
</div>
<div class="form-group">
  <label for="">Discount </label>
  <input type="text" name="discount_price" value="{{$product->discount_price}}"  id="" class="form-control" placeholder="Discount" aria-describedby="helpId">
  <small id="helpId" class="text-muted">
    @error('discount_price')
    {{$message}}
      @enderror
  </small>
</div>
<button type="submit" name="" id="" class="btn btn-primary" btn-lg btn-block>Add Product</button>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
