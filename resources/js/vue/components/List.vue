<template>
    <div>
        <h1>Listado de productos</h1>
        <o-table :data="producto.length == 0 ? [] : producto">
            <o-table-column field="id" label="ID" numeric v-slot="p">
                {{ p.row.id }}
            </o-table-column>
            <o-table-column field="title" label="Title" numeric v-slot="p">
                {{ p.row.title }}
            </o-table-column>
            <o-table-column field="description" label="Description" numeric v-slot="p">
                {{ p.row.description }}
            </o-table-column>
            <o-table-column field="price" label="Price" numeric v-slot="p">
                {{ p.row.price }}
            </o-table-column>
            <o-table-column field="quantity" label="Quantity" numeric v-slot="p">
                {{ p.row.quantity }}
            </o-table-column>
        </o-table>
    </div>
</template>

<script>

export default {

    data() {
        return {
            producto: [],
            loading: true
        }
    },

    async mounted() {
        this.$axios.get('/api/producto').then((res) => {
            this.producto = res.data.data;
            console.log(this.producto);
            this.loading = false;
        })
    }
}
</script>
