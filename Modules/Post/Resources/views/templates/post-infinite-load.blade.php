@if($nextpage > 0)
<div class="js-infinite-scroll__content" data-path="{{ url('/api/post/' . $post->id . '/page={n}') }}" data-current-page="{{ $nextpage }}">
@else
<div class="js-infinite-scroll__content">
@endif
  @if($post)
  <!-- Start of each post content -->
  <div class="margin-top-auto border-top border-contrast-lower"></div><!-- Divider -->
  <article class="container single-post max-width-sm padding-y-md" data-title="{!! $post->seo_title !!}" data-url="{{ url($post->url) }}">
    <div class="text-component text-left line-height-lg v-space-md margin-bottom-md text-sm">
      <h1>{{ $post->title }}</h1>
      <p class="color-contrast-medium text-md">{!! $post->description !!}</p>
      <figure class="">
        @if($post->video)
          <div class="video-wrap">
            <video id="video-player-{{$post->id}}" class="video-js video-small vjs-big-play-centered video-player" width="320" height="150" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "fluid": true}' poster="{{ $post->showThumbnail('medium') }}">
              <source src="{{ $post->video }}" type="{{ $post->video_type }}" />
              <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank"
                  >supports HTML5 video</a
                >
              </p>
            </video>
          </div>
        @else
          <img src="{{ $post->showThumbnail() }}" alt="Image of {{ $post->title }}">
        @endif

        <div class="author__content">
          <h4 class="story-v2__meta text-sm">
            by:
            <a href="{{ route('pages.profile.user', $post->user->username) }}" rel="author">
              {{ $post->user->name }}
            </a>
          </h4>
        </div>

        <span>
          @foreach($tag_pills as $tag_pills_key => $tag_pill_name)
            <a
              href="{{ route('pages.tags', $tag_pill_name) }}"
              class="btn color-contrast-medium post-thumbnail-tags-pill margin-xxxs margin-top-md"
              draggable="false" ondragstart="return false;"
            >
              {{ $tag_pill_name }}
            </a>
            @if($tag_pills_key < count($tag_pills) - 1)
            @endif
          @endforeach
        </span>
      </figure>
    </div>
  </article> <!-- End of each post content --> 
  @endif
</div>