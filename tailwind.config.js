/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/views/**/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                orange: "#ff9900",
                green: "#00c292",
                black: "#252525",
                background: "#2f2f2f",
            },
        },
    },
    plugins: [],
};
