@section('title', 'Meeting Room')

@empty( $errorMessage )

    <div>
        <p class="hidden mID">{{ $meetingId }}</p>
        <p class="hidden mTitle">{{ $meetingTitle }}</p>
        <p class="hidden isMine">{{ $isMine }}</p>
        <p class="hidden mBg">{{ setting('websiteColor', '#20063c' ) }}</p>
        @auth
            <p class="hidden mDisplayName">{{ auth()->user()->name }}</p>
        @else
            <p class="hidden mDisplayName">Anonymous</p>
        @endauth

        <div id="meeting" class="w-full h-screen"></div>
    </div>

@else

    <div class="my-40 text-3xl text-center">
        <div class="flex justify-center">
            <x-heroicon-o-ban class="w-20 h-20 my-3 text-red-600" />
        </div>
        <p>{{ $errorMessage }}</p>
    </div>

@endempty

@empty( $errorMessage )
    @push('scripts')
        <script src='https://meet.jit.si/external_api.js'></script>
        <script src="{{ asset('js/meeting.js') }}"></script>
    @endpush
@endempty

