<div>

    <x-baseview title="iOS Admob Settings">

        <x-form action="saveIosAdmob" backPressed="$set('showiOSAdmob', false)">

            <div class="w-full md:w-4/5 lg:w-5/12">

                <x-input title="App ID" name="app_id" :defer="false" />
                <x-input title="Banner Ad unit ID" name="banner_ad_id" :defer="false" />
                <x-input title="Interstitial Ad unit ID" name="interstitial_ad_id" :defer="false" />
                <x-checkbox
                    title="Enable"
                    name="ad_enable" :defer="false" />


                <x-buttons.primary title="Save Changes" />
            <div>
        </x-form>

    </x-baseview>

</div>
