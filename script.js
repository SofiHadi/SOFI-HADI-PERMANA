document.getElementById('mhsForm')?.addEventListener('submit', function(e) {
    const foto = document.getElementById('fotoMhs');
    if (foto.files.length > 0) {
        const file = foto.files[0];
        const size = file.size / 1024 / 1024;
        const ext = file.name.split('.').pop().toLowerCase();

        if (!['jpg', 'jpeg', 'png'].includes(ext)) {
            alert("Format file harus JPG, JPEG, atau PNG!");
            e.preventDefault();
        } else if (size > 2) {
            alert("Ukuran file maksimal 2MB!");
            e.preventDefault();
        }
    }
});