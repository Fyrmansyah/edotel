<script setup>
    import AppLayout from "../../../Layouts/Backoffice/AppLayout.vue";
    import Pagination from "../../../Components/Backoffice/Shared/Table/Pagination.vue";
    import Table from "../../../Components/Backoffice/Shared/Table/Table.vue";
    import Breadcrumb from "../../../Components/Backoffice/Shared/Navigations/Breadcrumb.vue";
    import PageHeader from "../../../Components/Backoffice/Shared/Navigations/PageHeader.vue";
    import Modal from "../../../Components/Backoffice/Shared/Modal/Modal.vue";
    import { useForm } from "@inertiajs/vue3";
    import Input from "../../../Components/Backoffice/Shared/Forms/Input.vue";
    import InputPassword from "../../../Components/Backoffice/Shared/Forms/InputPassword.vue";
    import { ROUTE_API } from "../../../Routes/Api";
    import { ref } from "vue";

    defineOptions({ layout: AppLayout });
    defineProps({ data: Object });

    const form = useForm({ username: null, password: null, role: "admin" });
    const editedAccount = ref(null);

    function handleEdit(account) {
        form.reset();
        form.clearErrors();
        editedAccount.value = account;
        form.username = account.username;
        form.password = null;
        form.role = account.role;

        $("#modal-form-superadmin").modal("show");
    }

    function submit() {
        if (editedAccount.value) {
            form.put(ROUTE_API.admin.accounts.update(editedAccount.value.id), {
                onSuccess: () => {
                    $("#modal-form-superadmin").modal("hide");
                    form.reset();
                },
            });
        } else {
            form.post(ROUTE_API.admin.accounts.create, {
                onSuccess: () => {
                    $("#modal-form-superadmin").modal("hide");
                    form.reset();
                },
            });
        }
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
                        <button class="btn btn-warning" @click="handleEdit(val)">edit</button>
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
            <div>
                <label class="form-label">Role</label>
                <select class="form-select" v-model="form.role">
                    <option value="admin">Admin</option>
                    <option value="superadmin">Superadmin</option>
                </select>
                <div v-if="form.errors.role" class="invalid-feedback">{{ form.errors.role }}</div>
            </div>
        </div>

        <template #footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" @click="submit" class="btn btn-primary">Save</button>
        </template>
    </Modal>
</template>
