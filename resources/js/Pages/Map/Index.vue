<template>
    <div>
        <GoogleMap
            :api-key="apiKey"
            style="width: 100%; height: 600px"
            :center="center"
            :zoom="3"
        >
            <MarkerCluster>
                <Marker
                    v-for="(lead, i) in props.leads"
                    :key="i"
                    :options="{ position: lead }"
                    @click="openInfoWindow(i)"
                >
                    <InfoWindow v-model="infoWindows[i].value">
                        <div>
                            <InfoWindowLeadRow label="Name">{{lead.name}}</InfoWindowLeadRow>
                            <InfoWindowLeadRow label="Firstname">{{lead.first_name}}</InfoWindowLeadRow>
                            <InfoWindowLeadRow label="City">{{lead.city}}</InfoWindowLeadRow>
                            <InfoWindowLeadRow label="Address">{{lead.address}}</InfoWindowLeadRow>
                            <InfoWindowLeadRow label="Postcode">{{lead.postcode}}</InfoWindowLeadRow>
                            <InfoWindowLeadRow label="Phone">{{lead.phone}}</InfoWindowLeadRow>
                            <InfoWindowLeadRow label="Email">{{lead.email}}</InfoWindowLeadRow>
                        </div>
                    </InfoWindow>
                </Marker>
            </MarkerCluster>
        </GoogleMap>
    </div>
</template>

<script setup>
import { GoogleMap, Marker, MarkerCluster, InfoWindow } from 'vue3-google-map'
import { ref, defineProps } from "vue";
import InfoWindowLeadRow from "./Components/InfoWindowLeadRow.vue";

const apiKey = import.meta.env.VITE_GOOGLE_API_KEY;

function calculateCenter(coordinates) {
    if (coordinates.length === 0) {
        return { lat: 0, lng: 0 };
    }
    let sumLat = 0;
    let sumLng = 0;
    for (const coordinate of coordinates) {
        sumLat += coordinate.lat;
        sumLng += coordinate.lng;
    }
    const avgLat = sumLat / coordinates.length;
    const avgLng = sumLng / coordinates.length;
    return { lat: avgLat, lng: avgLng };
}

const props = defineProps({
    leads: Array
})

const center = calculateCenter(props.leads);

let currentInfoWindow = null;
const infoWindows = props.leads.map(() => ref(false));

function openInfoWindow(i) {
    if(currentInfoWindow !== null){
        currentInfoWindow.value = false;
    }
    currentInfoWindow = infoWindows[i];
    currentInfoWindow.value = true;
}
</script>
