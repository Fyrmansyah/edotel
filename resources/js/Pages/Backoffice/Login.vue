<script setup>
    import { Form, usePage } from "@inertiajs/vue3";
    import Card from "../../Components/Backoffice/Shared/Card/Card.vue";
    import AuthLayout from "../../Layouts/Backoffice/AuthLayout.vue";
    import Input from "../../Components/Backoffice/Shared/Forms/Input.vue";
    import InputPassword from "../../Components/Backoffice/Shared/Forms/InputPassword.vue";
    import Swal from "sweetalert2";
    import { watchPostEffect } from "vue";
import Button from "../../Components/Backoffice/Shared/Buttons/Button.vue";

    const page = usePage();

    watchPostEffect(() => {
        if (page.props.flash?.error) {
            Swal.fire({
                icon: "error",
                text: page.props.flash.error,
            });
        }
    });
</script>

<template>
    <AuthLayout>
        <!-- Logo -->
        <div class="app-brand justify-content-center mb-4">
            <a href="index.html" class="app-brand-link gap-2">
                <img :src="'/shared/images/logo.png'" alt="" class="w-[200px]" />
            </a>
        </div>
        <!-- /Logo -->
        <Card>
            <template #header>
                <h1 class="card-title text-center">Login</h1>
            </template>

            <Form action="/admin/login" method="POST" #default="{ errors }">
                <div class="mb-3">
                    <Input
                        id="username"
                        name="username"
                        label="Username"
                        placeholder="Masukkan username"
                        autofocus
                        :err-message="errors.username"
                    />
                </div>
                <div class="mb-3 form-password-toggle">
                    <InputPassword
                        id="password"
                        label="Password"
                        name="password"
                        :err-message="'hihi'"
                    />
                </div>
                <div class="mb-3 mt-5">
                    <Button variant="primary" class="w-full" type="submit">Sign In</Button>
                </div>
            </Form>
        </Card>
    </AuthLayout>
</template>
