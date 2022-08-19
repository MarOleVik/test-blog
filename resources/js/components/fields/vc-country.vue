<template>
    <div>
        <div class="row mb-3">
            <label :for="field" class="col-md-4 col-form-label text-md-end">{{ title }}</label>

            <div class="col-md-6">
                <select class="form-control" v-model="country_id">
                    <option value="0">-- choose your country --</option>
                    <option v-for="country in countries" :value="country.id">{{ country.name }}</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-md-4 col-form-label text-md-end">City</label>

            <div class="col-md-6">
                <select class="form-control" v-model="city_id">
                    <option value="0">-- choose your city --</option>
                    <option v-for="city in cities" :value="city.id">{{ city.name }}</option>
                </select>
            </div>
        </div>

    </div>

</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            countries: [],
            country_id: 0,
            cities: [],
            city_id: 0,
        }
    },
    props: {
        title: String,
        field: String,
    },
    created: function () {
        this.getData();
    },
    watch: {
        country_id: function () {
            this.getCities();
        }

    },
    methods: {
        getData() {
            axios.get('/api/getAllCountries').then((res) => {
                this.countries = res.data;
            })
        },
        getCities() {
            axios.post('/api/getCitiesByCountry?XDEBUG_SESSION_START=14964', {
                country_id: this.country_id
            }).then((res) => {
                this.cities = res.data;
            })
        }

    }
}
</script>

<style scoped>

</style>
