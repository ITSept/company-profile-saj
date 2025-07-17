// tailwind.config.js

const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                // Anda bisa menambahkan font Poppins jika ingin:
                // poppins: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // ... (warna yang sudah Anda atur, bisa diganti indigo menjadi warna brand Anda)
            },
            // --- TAMBAH BAGIAN ANIMASI INI ---
            keyframes: {
                fadeInUp: {
                    "0%": {
                        opacity: "0",
                        transform: "translateY(20px)",
                    },
                    "100%": {
                        opacity: "1",
                        transform: "translateY(0)",
                    },
                },
            },
            animation: {
                "fade-in-up": "fadeInUp 1s ease-out forwards",
            },
            // --- AKHIR BAGIAN ANIMASI INI ---
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
