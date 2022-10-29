<body>
    <form action="" id="formulario">
        <input type="text" id="owo">
    </form>

    <script>
        const formContrasena = document.getElementById("formulario");
        const inputs = document.querySelectorAll('#formulario input');
        inputs.forEach((input) => {
            input.addEventListener('keyup', document.write(document.getElementById("owo").value));
        })
    </script>
</body>