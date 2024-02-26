{{-- <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container bg-light fixed-top ">
       <a class="navbar-brand" href="index.html"><img width="250" src="images/logo.png" alt="#" /></a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class=""> </span>
       </button>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
             <li class="nav-item active">
                <a class="nav-link" href=" {{route('home')}} ">Home <span class="sr-only">(current)</span></a>
             </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a href="about.html">About</a></li>
                   <li><a href="testimonial.html">Testimonial</a></li>
                </ul>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="product.html">Products</a>
             </li>

             <li class="nav-item">
                <a class="nav-link" href="blog_list.html">Blog</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
             </li>
             <form class="form-inline">
                 <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                 <i class="fa fa-search" aria-hidden="true"></i>
                 </button>
              </form>

              @if (auth()->user() && auth()->user()->usertype==0)
                  <li class="nav-item">
                 <a class="btn btn-secondary" href=" {{route('cart',['id' => auth()->user()->id])}} ">My Cart {{$count}} </a>
              </li>
              <li class="nav-item">
             <x-app-layout>
             </x-app-layout>
              </li>
             @elseif(auth()->user() && auth()->user()->usertype==1)
             <li class="nav-item">
            <a class="btn btn-secondary" href=" {{route('cart',['id' => auth()->user()->id])}} ">All Orders</a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="/redirect">
               <span class="menu-icon">
                 <i class="mdi mdi-speedometer"></i>
               </span>
               <span class="menu-title">Dashboard</span>
             </a>
           </li>
         <li class="nav-item">
        <x-app-layout>
        </x-app-layout>
         </li>
         @else
              <li class="nav-item">
                 <a class="nav-link btn btn-primary mr-3" href="/register" >Register</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link btn btn-secondary" href="/login">Login</a>
              </li>
            @endif

          </ul>
       </div>
    </nav>
 </div> --}}
