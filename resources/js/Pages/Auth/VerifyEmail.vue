<template>
    You need be verified first to see this page!

    <div>
        <Link :href="route('verification.send')" method="post" as="button" class="btn-primary">
            Resend Verification Email
        </Link>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import {route} from "ziggy-js";
</script>
