<!-- Top Nav Start -->
  <div id='cssmenu'>
    <ul>
      <li class=' <?= $heading == "home"?"active":"";?>'>
        <a href='/'>
          <i class="fa fa-home"></i>
          Home
        </a>
      </li>
      <li class=' <?= $heading == "detailers"?"active":"";?> '>
        <a href="{{ route('detailers') }}">
          <i class="fa fa-users"></i>
          Detailers
        </a>
      </li>
      <li class=' <?= $heading == "gallery"?"active":"";?> '>
        <a href='{{ route("gallery.index") }}'><i class="fa fa-picture-o"></i>Gallery</a>
      </li>
      <li class=' <?= $heading == "newsfeed"?"active":"";?> '>
        <a href='{{ route("newsfeed.index") }}'><i class="fa fa-file-text-o"></i>News Feed</a>
      </li>
      <li class=' <?= $heading == "product"?"active":"";?> '>
        <a href='{{ route("products.index") }}'><i class="fa fa-gift"></i>Products</a>
      </li>
    </ul>
  </div>
  <!-- Top Nav End -->