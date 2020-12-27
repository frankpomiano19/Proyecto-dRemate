<template>
<p>hola mundo</p>
    {{formatearFecha}}
</template>

<script>
export default {
    props:['fecha'],
    mounted() {
        console.log("Se recibio fecha :" ,this.fecha);
    },
    computed: {
        formatearFecha(){
            return moment(this.fecha).locale('es').format('DD [de] MMM [del] YYYY');
        }
    },
}
</script>
