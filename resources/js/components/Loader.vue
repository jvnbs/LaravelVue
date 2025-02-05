<template>
    <div class="loading-container">
        <div class="glowing-dot-loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <p class="mt-3 text-primary">Loading, please wait...</p>
    </div>
</template>

<style scoped>
/* Centering Loader */
.loading-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 250px;
}

/* 6 Glowing Dots Rotating in a Circle */
.glowing-dot-loader {
    position: relative;
    width: 90px;
    height: 90px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.glowing-dot-loader span {
    position: absolute;
    width: 12px;
    height: 12px;
    background-color: #4285f4; /* Google Blue */
    border-radius: 50%;
    animation: rotateDots 1.5s linear infinite,
        glowEffect 1.5s infinite alternate;
}

/* Adding 6 dots with delay */
.glowing-dot-loader span:nth-child(2) {
    background-color: #ea4335; /* Google Red */
    animation-delay: 0.2s;
}

.glowing-dot-loader span:nth-child(3) {
    background-color: #fbbc05; /* Google Yellow */
    animation-delay: 0.4s;
}

.glowing-dot-loader span:nth-child(4) {
    background-color: #34a853; /* Google Green */
    animation-delay: 0.6s;
}

.glowing-dot-loader span:nth-child(5) {
    background-color: #673ab7; /* Purple */
    animation-delay: 0.8s;
}

.glowing-dot-loader span:nth-child(6) {
    background-color: #ff9800; /* Orange */
    animation-delay: 1s;
}

/* Rotation Animation */
@keyframes rotateDots {
    0% {
        transform: rotate(0deg) translateY(-50px);
    }
    100% {
        transform: rotate(360deg) translateY(-50px);
    }
}

/* Glowing Effect */
@keyframes glowEffect {
    0% {
        box-shadow: 0 0 5px rgba(255, 255, 255, 0.2);
    }
    100% {
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
    }
}
</style>
