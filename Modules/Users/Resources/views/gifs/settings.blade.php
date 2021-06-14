@extends('users::gifs.master')
@section('content')
<section>
    <div class="container max-width-lg margin-top-xs">
      <div class="grid gap-md@md">
        @include('users::gifs.sidebar')
        <main class="position-relative padding-top-md z-index-1 col-12@md">
          <div class="bg radius-md padding-md shadow-sm">

            @if(session()->has('gifs-settings-alert'))
              <div class="alert js-alert margin-bottom-lg alert--is-visible" role="alert"> <!-- /.alert--is-visible -->
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <svg aria-hidden="true" class="icon margin-right-xxxs" viewBox="0 0 32 32"><title>info icon</title><g><path d="M16,0C7.178,0,0,7.178,0,16s7.178,16,16,16s16-7.178,16-16S24.822,0,16,0z M18,7c1.105,0,2,0.895,2,2 s-0.895,2-2,2s-2-0.895-2-2S16.895,7,18,7z M19.763,24.046C17.944,24.762,17.413,25,16.245,25c-0.954,0-1.696-0.233-2.225-0.698 c-1.045-0.92-0.869-2.248-0.542-3.608l0.984-3.483c0.19-0.717,0.575-2.182,0.036-2.696c-0.539-0.514-1.794-0.189-2.524,0.083 l0.263-1.073c1.054-0.429,2.386-0.954,3.523-0.954c1.71,0,2.961,0.855,2.961,2.469c0,0.151-0.018,0.417-0.053,0.799 c-0.066,0.701-0.086,0.655-1.178,4.521c-0.122,0.425-0.311,1.328-0.311,1.765c0,1.683,1.957,1.267,2.847,0.847L19.763,24.046z"></path></g></svg>
                    <div class="alert-message">{{ session()->get('gifs-settings-alert') }}</div><!-- /.alert-message -->
                  </div>
                </div>
              </div>
            @endif

            <form action="{{ (is_null($gifs_settings)) ? route('gifs.settings.store') : route('gifs.settings.update') }}" method="post">
                @csrf
                <fieldset class="margin-bottom-md">
                  <h3 class="margin-bottom-sm">Image Size</h3>
                  <label class="form-label margin-bottom-xxs">Medium Size</label>
                  <div class="grid gap-sm">
                    <div class="col-6@md">
                      <input class="form-control width-100%" type="text" value="{{ old('medium_width') ?: ((is_null($gifs_settings)) ? '' : $gifs_settings->medium_width) }}" name="medium_width" id="mediumWidth" placeholder="Enter width" required>
                    </div>
                
                    <div class="col-6@md">
                      <input class="form-control width-100%" type="text" value="{{ old('medium_height') ?: ((is_null($gifs_settings)) ? '' : $gifs_settings->medium_height) }}" name="medium_height" id="mediumHeight" placeholder="Enter height" required>
                    </div>
              
                </fieldset>
                
                {{-- 
                <fieldset class="margin-top-xxl">
                  <h3 class="margin-bottom-sm">Image Setting</h3>
              
                  <div class="flex flex-wrap gap-md">
                    @foreach(['maintain' => 'Maintain Aspect Ratio', 'crop' => 'Crop'] as $key => $image_setting)
                      <div>
                        <input class="radio" type="radio" value="{{ $key }}" name="image_setting" id="{{ $key }}"{{ (old('image_setting') == $key) ? ' checked' : ((!is_null($gifs_settings) && $gifs_settings->image_setting == $key) ? ' checked' : ((is_null($gifs_settings) && $key == 'maintain') ? ' checked' : '')) }}>
                        <label for="{{ $key }}">{{ $image_setting }}</label>
                      </div>
                    @endforeach
                  </div>
                </fieldset>

                <fieldset class="margin-top-xl">
                  <h3 class="margin-bottom-sm">Listing per page</h3>
                    <div class="col-6@md">
                      <input class="form-control width-100%" type="text" value="{{ old('list_per_page') ? old('list_per_page') : ((!is_null($gifs_settings)) ? $gifs_settings->list_per_page : '') }}" name="list_per_page" id="listPerPage" placeholder="Enter amount">
                    </div>
                </fieldset>
                --}}


                <div>
                  <button class="btn btn--primary margin-top-md">Save</button>
                </div>
              </form>
              
          </div><!-- /.bg radius-md padding-md shadow-sm -->
        </main>
      </div><!-- /.grid -->
    </div><!-- /.container -->
  </section>
@endsection
@push('module-scripts')
<!-- MODULE'S CUSTOM SCRIPT -->
  @include('users::partials.script-js')
@endpush