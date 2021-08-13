<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title>
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div class="col-span-6 sm:col-span-4" v-if="$page.jetstream.managesProfilePhotos">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            ref="photo"
                            @change="updatePhotoPreview">

                <jet-label for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div class="mt-2" v-show="! photoPreview">
                    <img :src="user.profile_photo_url" alt="Current Profile Photo" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" v-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <jet-secondary-button class="mt-2 mr-2" type="button" @click.native.prevent="selectNewPhoto">
                    Select A New Photo
                </jet-secondary-button>

                <jet-secondary-button type="button" class="mt-2" @click.native.prevent="deletePhoto" v-if="user.profile_photo_path">
                    Remove Photo
                </jet-secondary-button>

                <jet-input-error :message="form.error('photo')" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <jet-input-error :message="form.error('name')" class="mt-2" />
            </div>

            <!-- Date de naissance -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="date_birth" value="Date Of Birth" />
                <jet-input id="date_birth" type="date" class="mt-1 block w-full" v-model="form.date_birth" autocomplete="date_birth" />
                <jet-input-error :message="form.error('date_birth')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <jet-input-error :message="form.error('email')" class="mt-2" />
            </div>
            
            <!-- Username -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="username" value="Username" />
                <jet-input id="username" type="username" class="mt-1 block w-full" v-model="form.username" />
                <jet-input-error :message="form.error('username')" class="mt-2" />
            </div>

            <!-- City -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="city" value="City" />
                <jet-input id="city" type="city" placeholder="Ex : Abidjan" class="mt-1 block w-full" v-model="form.city" />
                <jet-input-error :message="form.error('city')" class="mt-2" />
            </div>

            <!-- Commune -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="commune" value="Commune" />
                <jet-input id="commune" type="commune" placeholder="Ex : Cocody" class="mt-1 block w-full" v-model="form.commune" />
                <jet-input-error :message="form.error('commune')" class="mt-2" />
            </div>

            <!-- District -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="district" value="District" />
                <jet-input id="district" type="district" class="mt-1 block w-full" placeholder="Ex : Riviera Golf, Attoban" v-model="form.district" />
                <jet-input-error :message="form.error('district')" class="mt-2" />
            </div>

            <!-- Bio -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="bio" value="Biography" />
                <!-- <jet-input id="bio" type="bio" class="mt-1 block w-full" v-model="form.bio" /> -->
                <textarea id="bio" placeholder="Tapez ici votre bio ..." class="form-input rounded-md shadow-sm mt-1 block w-full" v-model="form.bio" cols="30" rows="10"></textarea>
                <jet-input-error :message="form.error('bio')" class="mt-2" />
            </div>

        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        props: ['user'],

        data() {
            return {
                form: this.$inertia.form({
                    '_method': 'PUT',
                    name: this.user.name,
                    email: this.user.email,
                    photo: null,
                    username:this.user.username,
                    date_birth:this.user.date_birth,
                    city:this.user.city,
                    commune:this.user.commune,
                    district:this.user.district,
                    bio:this.user.bio,
                }, {
                    bag: 'updateProfileInformation',
                    resetOnSuccess: false,
                }),

                photoPreview: null,
            }
        },

        methods: {
            updateProfileInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('admin.user-profile-information.update').url(), {
                    preserveScroll: true
                });
            },

            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.photo.files[0]);
            },

            deletePhoto() {
                this.$inertia.delete(route('admin.current-user-photo.destroy').url(), {
                    preserveScroll: true,
                }).then(() => {
                    this.photoPreview = null
                });
            },
        },
    }
</script>
