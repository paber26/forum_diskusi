<template>
<div class="flex justify-center">
    <div class="bg-yellow-200 w-11/12 sm:w-5/6 flex flex-col justify-center items-center mt-4 p-2 rounded-2xl">
        <div class="font-semibold">Halo Bernaldo Napitupulu</div>
        <div class="font-italic">Lupakan masa lalu dan teruslah bergerak maju</div>
    </div>
</div>
</template>

<script>
export default {
    methods:{
        coba(){
            this.$swal('Halo')
        }
    }
}
</script>