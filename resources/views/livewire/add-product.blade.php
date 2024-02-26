<div>
    <form submit.prevent="submit"  enctype="multipart/form-data" class="col-6 ml-5">

    <div class="form-group">
      <label for="">Title</label>
      <input type="text" name="title" wire:model="title" id="" class="form-control" placeholder="title" aria-describedby="helpId">
      <small id="helpId" class="text-muted">
        @error('title')
      {{$message}}
        @enderror
      </small>
    </div>
    <div class="form-group">
      <label for="">Descriprion</label>
      <input type="text" name="description" wire:model="description" id="" class="form-control" placeholder="Description" aria-describedby="helpId">
      <small id="helpId" class="text-muted">
        @error('description')
        {{$message}}
          @enderror
      </small>
    </div>

    <div class="form-group">
      <label for="">Product Image</label>
      <input type="file" name="image" wire:model="image" id=""  class="form-control" placeholder="" aria-describedby="helpId">
      <small id="helpId" class="text-muted">@error('image')
        {{$message}}
          @enderror</small>
    </div>
    <select name="category" id="">
        <option value=""></option>
        {{-- @foreach ($categories as $category)
        <option value={{$category->id}}> {{$category->category}} </option>
        @endforeach --}}

    </select>
    <small>
        @error('category')
        {{$message}}
          @enderror
    </small>
    <div class="form-group">
      <label for="">Price</label>
      <input type="text" name="price" id=""  wire:model="price" class="form-control" placeholder="price" aria-describedby="helpId">
      <small id="helpId" class="text-muted">
        @error('price')
        {{$message}}
          @enderror
      </small>
    </div>

    <div class="form-group">
      <label for="">Quantity</label>
      <input type="number" name="quantity" id=""  wire:model="quantity" class="form-control" placeholder="Qusantity" aria-describedby="helpId">
      <small id="helpId" class="text-muted">
        @error('quantity')
        {{$message}}
          @enderror
      </small>
    </div>
    <div class="form-group">
      <label for="">Discount </label>
      <input type="text" name="discount_price" id=""  wire:model="discount_price" class="form-control" placeholder="Discount" aria-describedby="helpId">
      <small id="helpId" class="text-muted">
        @error('discount_price')
        {{$message}}
          @enderror
      </small>
    </div>
    <button type="submit" wire:click='submit' name="" id="" class="btn btn-primary"  btn-lg btn-block>Add Product</button>
    </form>
</div>
