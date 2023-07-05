<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600"> {{ status }} </div>
        <form @submit.prevent="submit">
            <section>
                <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 md:px-12 lg:px-12 lg:py-12">
                    <div class="justify-center mx-auto text-left align-bottom transition-all transform bg-sky-200 rounded-lg sm:align-middle sm:max-w-2xl sm:w-full">
                        <div class="grid flex-wrap items-center justify-center grid-cols-1 mx-auto shadow-xl lg:grid-cols-2 rounded-xl">
                            <div class="w-full px-6 py-12">
                                <div>
                                    <div class="mt-3 text-left sm:mt-5">
                                        <div class="inline-flex items-center w-full">
                                            <h3 class="text-lg font-bold text-neutral-600 l eading-6 lg:text-3xl">ログイン</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 space-y-2">
                                    <div>
                                        <InputLabel for="email" value="Email" />
                                        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
                                        <InputError class="mt-2" :message="form.errors.email" />
                                    </div>
                                    <div>
                                        <InputLabel for="password" value="Password" />
                                        <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
                                        <InputError class="mt-2" :message="form.errors.password" />
                                    </div>
                                    <div class="flex flex-col mt-4 lg:space-y-2">
                                        <label class="flex items-center">
                                            <Checkbox name="remember" v-model:checked="form.remember" />
                                            <span class="ml-2 text-sm text-gray-600">ログイン情報を保存する</span>
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-center mt-4 pt-4">
                                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing"> Log in </PrimaryButton>
                                    </div>
                                    <div class="flex items-center justify-center mt-4 pt-4">
                                        <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> パスワードを忘れた場合 </Link>
                                    </div>
                                </div>
                            </div>
                            <div class="order-first hidden w-10/12 lg:block mx-auto">
                                <img class="object-cover h-full bg-cover rounded-full" src="storage/pokeLogin.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </GuestLayout>
</template>
