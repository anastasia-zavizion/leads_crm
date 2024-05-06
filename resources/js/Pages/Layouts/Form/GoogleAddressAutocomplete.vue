<template>

</template>

<script setup>
const props = defineProps({
    name:String
})

import loadGoogleMapsApi from 'load-google-maps-api';
loadGoogleMapsApi({
    key: import.meta.env.VITE_GOOGLE_API_KEY,
    libraries: ['places']
}).then(function () {
    const input = document.getElementById("address");
    let autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener("place_changed", onPlaceChange)
    function onPlaceChange() {
        const place = autocomplete.getPlace();
        const addressComponents = place.address_components;
        let street = '';
        let streetNumber= '';
        for (let component of addressComponents) {
            switch (component.types[0]) {
                case "locality": // City
                    form.city = component.long_name;
                    break;
                case "postal_code":
                    form.postcode = component.long_name;
                    break;
                case "country":
                    form.country = component.long_name;
                    break;
                case "route":
                    street = component.long_name;
                    break;
                case "street_number":
                    streetNumber = component.long_name;
                    break;
                // Add more cases for other components as needed
            }
        }
        form.address = street+' '+streetNumber;
    }

}).catch(function (error) {
    console.error(error)
})


</script>
