@if($nextpage > 0)
<ul class="js-infinite-scroll__content" data-path="{{ url('/api/posts/page={n}') }}" data-current-page="{{ $nextpage }}">
@else
<ul class="js-infinite-scroll__content">
@endif
@foreach($posts as $post)
  <li class="masonry__item js-masonry__item">
  @if($post->thumbnail)
    <a class="thumb" href="{{ route('pages.post', ['locale' => config('app.locale'), 'slug'   => $post->slug]) }}">
      <img class="block width-500%" src="{{ $post->showThumbnail('medium') }}" alt="Image of {{ $post->title }}">
    </a>
  @else
    <span class="card__img card__img-cropped bg-black bg-opacity-50%"></span>
  @endif
    <div class="user-cell">
      <div class="user-cell__body">
        <figure aria-hidden="true">
          <a href="{{ route('pages.profile.user', $post->username) }}">
            @if(! is_null($post->avatar))
              <img class="user-cell__img" src="{{ asset('storage/users-images/avatars') . '/' . $post->avatar }}" alt="User profile image">
            @else
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="auto" viewBox="0 0 25 25">
              <title>face-man</title>
              <g stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" transform="translate(0.5 0.5)"
                fill="#a8a8a8" stroke="#a8a8a8">
                <path fill="none" stroke-miterlimit="10"
                  d="M1.051,10.933 C4.239,6.683,9.875,11.542,16,6c3,4.75,6.955,4.996,6.955,4.996"></path>
                <circle data-stroke="none" fill="#a8a8a8" cx="7.5" cy="14.5" r="1.5" stroke-linejoin="miter"
                  stroke-linecap="square" stroke="none"></circle>
                <circle data-stroke="none" fill="#a8a8a8" cx="16.5" cy="14.5" r="1.5" stroke-linejoin="miter"
                  stroke-linecap="square" stroke="none"></circle>
                <circle fill="none" stroke="#a8a8a8" stroke-miterlimit="10" cx="12" cy="12" r="11"></circle>
              </g>
            </svg>
            @endif
          </a>
        </figure>
        <div class="user-cell__content text-component line-height-xs v-space-xxs text-sm line-height-md">
          <p><a class="color-contrast-high" href="#0">{{ $post->name }}</a></p>
          <p class="color-contrast-medium text-xs">{{ $post->created_at->format('F j, Y') }}</p>
        </div>
      </div>
    </div>
  </li>  
@endforeach
</ul>