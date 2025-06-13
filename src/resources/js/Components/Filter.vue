<template>
    <form action="">
        <div class="flex justify-start gap-5">
            <select>
                <option disabled selected>Condition</option>
                <option value="Ok">Ok</option>
                <option value="Good">Good</option>
                <option value="Great">Great</option>
                <option value="Excellent">Excellent</option>
                <option value="Like New">Like New</option>
            </select>
            <input class="w-1/12" type="text" placeholder="price from">
            <input class="w-1/12" type="text" placeholder="price to">
            <select>
                <option disabled selected>Transmission</option>
                <option value="Automatic">Automatic</option>
                <option value="Manual">Manual</option>
            </select>
            <select>
                <option disabled>Select</option>
                <option value="FWD">FWD</option>
                <option value="RWD">RWD</option>
                <option value="AWD">AWD</option>
                <option value="4WD">4WD</option>
            </select>
            <div>year</div>
            <div>mpg</div>
            <div>mi</div>
            <button type="submit">filter</button>
            <button type="reset">reset</button>
        </div>
    </form>
</template>

<script setup lang="ts">
</script>