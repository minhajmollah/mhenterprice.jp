  <div class="clr"></div>
  <div class="bx-wrapper">
      <div class="bx-viewport">
          <ul class="slide-container" id="bxslider">
              @foreach ($banners as $banner)
                  <li class="bx-clone">
                      <a href="{{ asset('/') }}"><img src="{{ asset($banner->photo) }}"
                              class="img-responsive center-block" alt="Used cars Stock" /></a>
                  </li>
              @endforeach

          </ul>
      </div>
  </div>
