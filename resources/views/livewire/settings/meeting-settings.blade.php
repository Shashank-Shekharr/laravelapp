<div>

    <x-baseview title="Meeting Settings">

        <x-form action="saveMeetingSetting" backPressed="$set('showMeeting', false)">

            <div class="w-full md:w-4/5 lg:w-5/12">

                <x-checkbox
                    title="Mandatory Login"
                    description="Must Login To Create or Join Meeting"
                    name="mandatoryLogin" :defer="false" />
                <x-checkbox
                    title="Unauthorized Meeting ID"
                    description="Allow users join meeting created outside app"
                    name="unauthorizedMeeting" :defer="false" />

                <x-buttons.primary title="Save Changes" />
            <div>
        </x-form>

    </x-baseview>

</div>
