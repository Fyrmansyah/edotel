<template>
    <div class="card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <slot name="thead"></slot>
                </thead>
                <tbody>
                    <slot name="tbody"></slot>
                </tbody>
            </table>
        </div>
    </div>
</template>
