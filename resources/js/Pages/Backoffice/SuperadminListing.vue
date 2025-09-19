<script setup>
    import AppLayout from "../../Layouts/Backoffice/AppLayout.vue";
    import Pagination from "../../Components/Backoffice/Shared/Table/Pagination.vue";
    import Table from "../../Components/Backoffice/Shared/Table/Table.vue";
    import Breadcrumb from "../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import PageHeader from "../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import Modal from "../../Components/Backoffice/Shared/Modal/Modal.vue";
    import { useForm } from "@inertiajs/vue3";
    import Input from "../../Components/Backoffice/Shared/Forms/Input.vue";
    import InputPassword from "../../Components/Backoffice/Shared/Forms/InputPassword.vue";
    import { Alert } from "../../Helpers/sweet-alert";

    defineOptions({ layout: AppLayout });
    defineProps({ data: Object });

    const form = useForm({ username: "", password: "" });

    function submit() {
        form.post("/accounts/superadmin", {
            onSuccess: ({ props }) => Alert.success(props.flash?.success),
            onError: ({ props }) => Alert.error(props.flash?.error),
            onFinish: () => $("#modal-form-superadmin").modal("hide"),
        });
    }
</script>
<template>
    <PageHeader>
        <Breadcrumb :paths="[{ label: 'Accounts' }, { label: 'Superadmin' }]" />
        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modal-form-superadmin"
        >
            Tambah Akun
        </button>
    </PageHeader>
    <Table>
        <template #thead>
            <tr>
                <th>#</th>
                <th>username</th>
                <th>Role</th>
                <th class="w-0">Action</th>
            </tr>
        </template>
        <template #tbody>
            <tr v-for="(val, idx) in data?.data">
                <td>{{ idx + data?.from }}</td>
                <td>{{ val.username }}</td>
                <td>{{ val.role }}</td>
                <td>
                    <div class="flex gap-2">
                        <button class="btn btn-warning">edit</button>
                        <button class="btn btn-danger">delete</button>
                    </div>
                </td>
            </tr>
        </template>
    </Table>
    <Pagination :links="data?.links" />

    <Modal id="modal-form-superadmin" title="Form Superadmin">
        <div class="flex-col flex gap-3">
            <Input label="username" v-model="form.username" :err-message="form.errors.username" />
            <InputPassword
                label="password"
                v-model="form.password"
                :err-message="form.errors.password"
            />
        </div>

        <template #footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" @click="submit" class="btn btn-primary">Save</button>
        </template>
    </Modal>
</template>
