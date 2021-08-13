<template>
    <div>
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <page-header> 
            <template #bigTitle>My Profile</template>
            <template #lv1>Profile</template>
        </page-header>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <update-profile-information-form :user="$page.user"/>

                <jet-section-border />

                <update-password-form class="mt-10 sm:mt-0" />

                <div v-if="$page.jetstream.canManageTwoFactorAuthentication">
                    <jet-section-border />

                    <two-factor-authentication-form class="mt-10 sm:mt-0" />
                </div>

                <jet-section-border />

                <!-- <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0" />

                <jet-section-border /> -->

                <!-- <delete-user-form class="mt-10 sm:mt-0" /> -->
            </div>
        </div>
    </div>
</template>

<script>
    import AdminLayout from '@/Layouts/AdminLayout'
    import DeleteUserForm from './DeleteUserForm'
    import JetSectionBorder from '@/Jetstream/SectionBorder'
    import LogoutOtherBrowserSessionsForm from './LogoutOtherBrowserSessionsForm'
    import TwoFactorAuthenticationForm from './TwoFactorAuthenticationForm'
    import UpdatePasswordForm from './UpdatePasswordForm'
    import UpdateProfileInformationForm from './UpdateProfileInformationForm'
    import PageHeader from '@/components/PageHeader'

    export default {
        metaInfo: { title: 'Profile' },
        props: ['sessions'],
        layout:AdminLayout,
        components: {
            DeleteUserForm,
            JetSectionBorder,
            LogoutOtherBrowserSessionsForm,
            TwoFactorAuthenticationForm,
            UpdatePasswordForm,
            UpdateProfileInformationForm,
            PageHeader,
        },
    }
</script>
