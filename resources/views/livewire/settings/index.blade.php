@section('title', 'Settings')
<div>

    <x-baseview title="Settings">

        <div class="grid grid-cols-1 gap-6 mt-10 md:grid-cols-2 lg:grid-cols-3">

            {{-- Firebase settings --}}
            <x-settings-item title="Firebase" wireClick="notificationSetting" >
                <x-heroicon-o-identification class="w-5 h-5 mr-4" />
            </x-settings-item>

            {{-- app settings --}}
            <x-settings-item title="App Settings" wireClick="appSettings" >
                <x-heroicon-o-cog class="w-5 h-5 mr-4" />
            </x-settings-item>

            {{-- Meeting settings --}}
            <x-settings-item title="Meeting Settings" wireClick="meetingSettings" >
                <x-heroicon-o-video-camera class="w-5 h-5 mr-4" />
            </x-settings-item>

            {{-- Privacy policy --}}
            <x-settings-item title="Privacy & Policy" wireClick="privacySettings" >
                <x-heroicon-o-eye-off class="w-5 h-5 mr-4" />
            </x-settings-item>

            {{-- Admob android --}}
            <x-settings-item title="Admob (Android)" wireClick="androidAdmob" >
                <x-heroicon-o-cursor-click class="w-5 h-5 mr-4" />
            </x-settings-item>

            {{-- Admob iOS --}}
            <x-settings-item title="Admob (iOS)" wireClick="iosAdmob" >
                <x-heroicon-o-cursor-click class="w-5 h-5 mr-4" />
            </x-settings-item>

        </div>

    </x-baseview>

</div>
